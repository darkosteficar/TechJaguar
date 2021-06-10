<?php

namespace App\Http\Controllers;

use App\Models\Cpu;
use App\Models\Psu;
use App\Models\Mobo;
use App\Models\Build;
use App\Models\Cooler;
use App\Models\PcCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class BuildController extends Controller
{
    public function index(Request $request)
    {
        $total = $power_req = 0;
        $cpu = $case = $psu = $mobo = $cooler = $pc_case = '';
        $errors = $errors_components = $warnings = array();
       

        if($request->hasCookie('build_id') != false){
            $build = Build::find(request()->cookie('build_id'));
            if($build != null){
                $components = array();
                $components['rams'] = $components['gpus'] = $components['storages'] = $components['fans'] = array();
                if($build->psu_id != null){
                    $psu = Psu::find($build->psu_id);
                    $components['psu'] = $psu;
                    $total += $psu->price;
                    //return view('build',['psu'=>$psu]);
                }
                if($build->mobo_id != null){
                    $mobo = Mobo::find($build->mobo_id);
                    $components['mobo'] = $mobo;
                    $total += $mobo->price;
                    $power_req += 70;
                }
                if($build->cpu_id != null){
                    $cpu = Cpu::find($build->cpu_id);
                    $components['cpu'] = $cpu;
                    $total += $cpu->price;
                    $power_req += $cpu->tdp * 1.2;
                }
                if($build->cooler_id != null){
                    $cooler = Cooler::find($build->cooler_id);
                    $components['cooler'] = $cooler;
                    $total += $cooler->price;
                    if($cooler->water_cooled){
                        $power_req += 100;
                    }
                    else{
                        $power_req += 3;
                    }
                }
        
                if($build->pc_case_id != null){
                    $pc_case = PcCase::find($build->pc_case_id);
                    $components['pc_case'] = $pc_case;
                    $total += $pc_case->price;
                }
                $gpus = $build->gpus;
                if(!$gpus->isEmpty()){
                    $components['gpus'] = $gpus;
                    foreach($components['gpus'] as $gpu){
                        $total += $gpu->price;
                        $power_req += $gpu->power_req;
                    }

                }
        
                $rams = $build->rams;
                if(!$rams->isEmpty()){
                    $components['rams'] = $rams;
                    foreach($components['rams'] as $ram){
                        $total += $ram->price;
                        $power_req += 10;
                    }
                }
        
                $storages = $build->storages;
                if(!$storages->isEmpty()){
                    $components['storages'] = $storages;
                    foreach($components['storages'] as $storage){
                        $total += $storage->price;
                        if($storage->type == 'hdd'){
                            $power_req += 15;
                        }
                        elseif($storage->type == 'ssd'){
                                $power_req += 5;
                        }
                        else{
                            $power_req += 7;
                        }
                    }
                }
                
                $fans = $build->fans;
                if(!$fans->isEmpty()){
                    $components['fans'] = $fans;
                    foreach($components['fans'] as $fan){
                        $total += $fan->price;
                        $power_req += 3;
                    }
                }
          
                $errorsAll = $this->validateMotherboardCase($pc_case,$mobo,$errors,$errors_components,$warnings);
                $errors_components =  $errorsAll[0];
                $errors = $errorsAll[1];
                $errorsAll = $this->validateMotherboardCpu($cpu,$mobo,$errors,$errors_components,$warnings);
                $errors_components =  $errorsAll[0];
                $errors = $errorsAll[1];
                $warnings = $errorsAll[2];
                $errorsAll = $this->validatePsu($psu,$power_req,$errors,$errors_components,$warnings);
                $errors_components =  $errorsAll[0];
                $errors = $errorsAll[1];
                $warnings = $errorsAll[2];
            
                return view('build',['components'=>$components,'total'=>$total,'errors'=>$errors,'errors_components'=>$errors_components,'warnings'=>$warnings,'power_req'=>$power_req]);
            }
            else{
                $build = Build::create();
                $duration = 60 * 24 * 365;
                Cookie::queue('build_id', $build->id, $duration);
                return view('build',[]);
            }
            
        }
        else{ 
            $build = Build::create();
            $duration = 60 * 24 * 365;
            //request()->cookie('build_id', $build->id, $duration);
            Cookie::queue('build_id', $build->id, $duration);
            return view('build',[]);
        }
       
    }


    public function validateMotherboardCase($case,$mobo,$errors,$errors_components,$warnings)
    {
        $mobo_case = $allErrors = array();
        if($case != '' && $mobo != ''){
            if($case->motherboard_form_factor == 'Mini-ITX'){
                if($mobo->form_factor != 'Mini-ITX'){
                    array_push($mobo_case,'Podržane veličine za ovo kučište su: Mini-ITX. Matična ploča je veličine ' . $mobo->form_factor);
                    array_push($errors_components,'case','mobo');
                }
            }
            if($case->motherboard_form_factor == 'Micro-ATX'){
                if($mobo->form_factor == 'ATX'){
                    array_push($mobo_case,'Podržane veličine za ovo kučište su: Mini-ITX,Micro-ATX. Matična ploča je veličine ' . $mobo->form_factor);
                    array_push($errors_components,'case','mobo');
                }
            }
        }
        $errors['mobo_case'] = $mobo_case;
        array_push($allErrors,$errors_components,$errors);
        return $allErrors;
    }

    public function validateMotherboardCpu($cpu,$mobo,$errors,$errors_components,$warnings)
    {
        $mobo_cpu = $warningsM = $allErrors =  array();
        if($cpu != '' && $mobo != ''){
            if($cpu->socket != $mobo->socket){
                array_push($mobo_cpu,'Socketi nisu identični, Matična Ploča: '.$mobo->socket.',Procesor:'.$cpu->socket);
                array_push($errors_components,'cpu','mobo');
            }
            if($cpu->tdp > 90){
                if($mobo->chipset->name == 'A320' || $mobo->chipset->name == 'A520' || $mobo->chipset->name == 'B560'){
                    array_push($warningsM,'Moguće pregrijavanje VRM-a nakon overlocka procesora. ');
                }
            }
            else{
                array_push($warningsM,'Moguće pregrijavanje VRM-a nakon overlocka procesora. ');
            }
        }
        $errors['mobo_cpu'] = $mobo_cpu;
        $warnings['mobo_cpu'] = $warningsM;
        array_push($allErrors,$errors_components,$errors,$warnings);
        return $allErrors;
    }

    public function validateGpuPsu($gpus,$psu)
    {
        $errors = $errors_components  = $allErrors =  array();
        $power_req = 0;
        foreach($gpus as $gpu){
            $power_req += $gpu->power_req;
        }
        if($case != '' && $mobo != ''){
            if($case->motherboard_form_factor == 'Mini-ITX'){
                if($mobo->form_factor != 'Mini-ITX'){
                    array_push($errors,'Podržane veličine za ovo kučište su: Mini-ITX. Matična ploča je veličine ' . $mobo->form_factor);
                    array_push($errors_components,'case','mobo');
                }
            }
            if($case->motherboard_form_factor == 'Micro-ATX'){
                if($mobo->form_factor == 'ATX'){
                    array_push($errors,'Podržane veličine za ovo kučište su: Mini-ITX,Micro-ATX. Matična ploča je veličine ' . $mobo->form_factor);
                    array_push($errors_components,'case','mobo');
                }
            }
        }
        array_push($allErrors,$errors_components,$errors);
        return $allErrors;
    }

    public function validatePsu($psu,$power_req,$errors,$errors_components,$warnings)
    {
        $psu_1 = $warningsM = $allErrors =  array();
        if($power_req > ($psu->wattage * 0.8)){
            array_push($psu_1,'Radi sigurnosti totalna količina potrošnje treba biti bar 20% manja od maksimalne snage napajanja.');
            array_push($errors_components,'psu');
        }
        if($power_req > 500){
            if($mobo->form_factor == '80+'){
                array_push($warningsM,'Preporučljivo je da za jakost ovakve konfiguracije se koristi bar napajanje sa 80+ Bronze certifikatom.');
            }
        }
        $errors['psu'] = $psu_1;
        $warnings['psu'] = $warningsM;
        array_push($allErrors,$errors_components,$errors,$warnings);
        return $allErrors;
    }

    
}
