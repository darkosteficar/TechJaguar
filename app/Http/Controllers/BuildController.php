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
    public $mobo = '';
    public $case = '';
    public $psu = '';
    public $cpu = '';
    public $power_req = '';
    public $gpus = '';
    public $cooler = '';
    public $rams = '';
    public $storages = '';
    public $fans = '';

    public function index(Request $request)
    {
        $others = array();
        $total = $power_req = 0;
        $cpu = $case = $psu = $mobo = $cooler = $pc_case = '';
        $errors = $errors_components = $warnings = array();
        
        
        if($request->hasCookie('build_id') != false){
            
            $build = Build::find(request()->cookie('build_id'));
            if($build != null){
                
                $saved = ($build->user_id == null) ? false : true;
                $components = array();
                $components['rams'] = $components['gpus'] = $components['storages'] = $components['fans'] = array();
                if($build->psu_id != null){
                    $psu = Psu::find($build->psu_id);
                    $components['psu'] = $psu;
                    $total += $psu->price;
                    $this->psu = $psu;
                    //return view('build',['psu'=>$psu]);
                }
                if($build->mobo_id != null){
                    $mobo = Mobo::find($build->mobo_id);
                    $components['mobo'] = $mobo;
                    $total += $mobo->price;
                    $power_req += 70;
                    $this->mobo = $mobo;
                    
                }
                if($build->cpu_id != null){
                    $cpu = Cpu::find($build->cpu_id);
                    $components['cpu'] = $cpu;
                    $total += $cpu->price;
                    $power_req += $cpu->tdp * 1.2;
                    $this->cpu = $cpu;
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
                    $this->cooler = $cooler;
                    $others['cooler'] = ($cooler->water_cooled == 1) ? 'Water Cooling' : 'Air';
                    
                }
        
                if($build->pc_case_id != null){
                    $pc_case = PcCase::find($build->pc_case_id);
                    $components['pc_case'] = $pc_case;
                    $total += $pc_case->price;
                    $this->case = $pc_case;
                    $others['case'] = $pc_case->type;
                }
                $gpus = $build->gpus;
                $this->gpus = $gpus;
                if(!$gpus->isEmpty()){
                    $components['gpus'] = $gpus;
                    foreach($components['gpus'] as $gpu){
                        $total += $gpu->price;
                        $power_req += $gpu->tdp;
                    }

                }
        
                $rams = $build->rams;
                $this->rams = $rams;
                $ram_speed = 7000;
                $ram_capacity = 0;
                if(!$rams->isEmpty()){
                    $components['rams'] = $rams;
                    foreach($components['rams'] as $ram){
                        $total += $ram->price;
                        $power_req += 10;
                        $ram_capacity += $ram->size;
                        $ram_speed = ($ram->speed < $ram_speed) ? $ram->speed : $ram_speed;
                    }
                    $others['ram_capacity'] = $ram_capacity;
                    $others['ram_speed'] = $ram_speed;
                }
        
                $storages = $build->storages;
                $this->storages = $storages;
                if(!$storages->isEmpty()){
                    $components['storages'] = $storages;
                    $storage_cap = 0;
                    foreach($components['storages'] as $storage){
                        $total += $storage->price;
                        $storage_cap += $storage->capacity;
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
                    $others['capacity'] = $storage_cap;
                }
                
                $fans = $build->fans;
                $this->fans = $fans;
                if(!$fans->isEmpty()){
                    $components['fans'] = $fans;
                    foreach($components['fans'] as $fan){
                        $total += $fan->price;
                        $power_req += 3;
                    }
                }
                $this->power_req = $power_req;
                $allErrors = array();
                $allErrors = $this->checkErrors($errors,$errors_components,$warnings);
                $errors = $allErrors[0];
               
                $errors_components = $allErrors[1];
                //dd($errors,$errors_components);
                $warnings = $allErrors[2];
                
                return view('build',['components'=>$components,'total'=>$total,'errors'=>$errors,'errors_components'=>$errors_components,'warnings'=>$warnings,'power_req'=>$power_req,'others'=>$others,'saved'=>$saved]);
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

    public function add(Request $request)
    {
        $user = auth()->user();
        $build = auth()->user()->builds()->create([
            'name'=>$request->name,
            'user_id'=>$user->id
        ]);
        Cookie::forget('build_id');
        $duration = 60 * 24 * 365;
        Cookie::queue('build_id', $build->id, $duration);
        return redirect()->route('build');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $build = Build::find(request()->cookie('build_id'));
        $build->name = $request->name;
        $build->user_id = $user->id;
        return redirect()->route('build');
    }

    public function select(Request $request)
    {
        Cookie::forget('build_id');
        $duration = 60 * 24 * 365;
        Cookie::queue('build_id', $request->build_id, $duration);
        return redirect()->route('build');
    }

    public function delete(Request $request)
    {
        $build = Build::find($request->build_id);
        $build->delete();
        $buildables = Buildables::where($build_id,$request->build_id)->delete();
        return redirect()->route('build');
    }

    public function checkErrors($errors,$errors_components,$warnings)
    {
        $allErrors = array();
        
        $errorsAll = $this->validateMotherboardCase($this->case,$this->mobo,$errors,$errors_components,$warnings);
        $errors_components =  $errorsAll[0];
        $errors = $errorsAll[1];
        $errorsAll = $this->validateMotherboardCpu($this->cpu,$this->mobo,$errors,$errors_components,$warnings);
        $errors_components =  $errorsAll[0];
        $errors = $errorsAll[1];
        $warnings = $errorsAll[2];
        $errorsAll = $this->validatePsu($this->psu,$this->power_req,$errors,$errors_components,$warnings);
        $errors_components =  $errorsAll[0];
        $errors = $errorsAll[1];
        $warnings = $errorsAll[2];
        $errorsAll = $this->validateGpu($this->gpus,$this->case,$this->mobo,$this->psu,$errors,$errors_components,$warnings);
        $errors_components =  $errorsAll[0];
        $errors = $errorsAll[1];
        $warnings = $errorsAll[2];
        $errorsAll = $this->validateFans($this->fans,$this->case,$this->mobo,$errors,$errors_components,$warnings);
        $errors_components =  $errorsAll[0];
        $errors = $errorsAll[1];
        $warnings = $errorsAll[2];
        $errorsAll = $this->validateCooler($this->cooler,$this->case,$errors,$errors_components,$warnings);
        $errors_components =  $errorsAll[0];
        $errors = $errorsAll[1];
        $warnings = $errorsAll[2];
        $errorsAll = $this->validateStorage($this->storages,$this->case,$this->mobo,$errors,$errors_components,$warnings);
        $errors_components =  $errorsAll[0];
        $errors = $errorsAll[1];
        $warnings = $errorsAll[2];
        $errorsAll = $this->validateRam($this->rams,$this->mobo,$errors,$errors_components,$warnings);
        $errors_components =  $errorsAll[0];
        $errors = $errorsAll[1];
        $warnings = $errorsAll[2];
        array_push($allErrors,$errors,$errors_components,$warnings);
        
        return $allErrors;
    }


    public function validateMotherboardCase($case,$mobo,$errors,$errors_components,$warnings)
    {
        $mobo_case = $allErrors = array();
        if($case != '' && $mobo != ''){
            if($case->motherboard_form_factor == 'Mini-ITX'){
                if($mobo->form_factor != 'Mini-ITX'){
                    array_push($mobo_case,'This Case supports these Motherboard form factors: Mini-ITX. Selected Motherboard has this form factor: ' . $mobo->form_factor);
                    array_push($errors_components,'case','mobo');
                }
            }
            if($case->motherboard_form_factor == 'Micro-ATX'){
                if($mobo->form_factor == 'ATX'){
                    array_push($mobo_case,'This Case supports these Motherboard form factors: Mini-ITX,Micro-ATX. Selected Motherboard has this form factor: ' . $mobo->form_factor);
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
                array_push($mobo_cpu,'The selected Motherboard and the selected CPU are not compatible. Motherboard socket: '.$mobo->socket.'. CPU socket: '.$cpu->socket);
                array_push($errors_components,'cpu','mobo');
            }
            if($cpu->tdp > 90){
                if($mobo->chipset->name == 'A320' || $mobo->chipset->name == 'A520' || $mobo->chipset->name == 'B560'){
                    array_push($warningsM,'Risk of VRAM throtlling after CPU overclock. ');
                }
            }
        }
        $errors['mobo_cpu'] = $mobo_cpu;
        $warnings['mobo_cpu'] = $warningsM;
        array_push($allErrors,$errors_components,$errors,$warnings);
        return $allErrors;
    }

    public function validateGpu($gpus,$case,$mobo,$psu,$errors,$errors_components,$warnings)
    {
        $gpu_1 = $warningsM = $allErrors =  array();
        $num_gpus = count($gpus);
        if($num_gpus > 0){
            if($psu != ''){
                if($psu->pcie_6_2_pin_connectors < $num_gpus){
                    array_push($gpu_1,'Too few PCI-E 6+2 cables, number of PCI-E 6+2 cables: ' . $psu->pcie_6_2_pin_connectors);
                    array_push($errors_components,'psu','gpus');
                }
            }
            if($case != ''){
                if($case->max_gpu_length < $gpus[0]->length){
                    array_push($gpu_1,'Selected GPU is physically incompatible, max GPU length: ' . $case->max_gpu_length . ' mm');
                    array_push($errors_components,'case','gpus');
                }
            }
            if($mobo != ''){
                if($mobo->pci_e_x16_slots < $num_gpus){
                    array_push($gpu_1,'Too many GPUs selected, number of PCI-E x16 slots' . $mobo->pci_e_x16_slots);
                    array_push($errors_components,'mobo','gpus');
                }
            }
            
        }
       
        $errors['gpus'] = $gpu_1;
        $warnings['gpus'] = $warningsM;
        array_push($allErrors,$errors_components,$errors,$warnings);
        return $allErrors;
    }

    public function validatePsu($psu,$power_req,$errors,$errors_components,$warnings)
    {
        $psu_1 = $warningsM = $allErrors =  array();
        if($psu != '' ){
            if($power_req > ($psu->wattage * 0.8)){
                array_push($psu_1,'For safety reasons, there has to be at least 20% PSU wattage headroom.');
                array_push($errors_components,'psu');
            }
            if($power_req > 500){
                if($psu->efficiency == '80+'){
                    array_push($warningsM,'For the build of this wattage, it is recommended to have a PSU with at least 80+ Bronze efficiency.');
                }
            }
        }
        $errors['psu'] = $psu_1;
        $warnings['psu'] = $warningsM;
        array_push($allErrors,$errors_components,$errors,$warnings);
        return $allErrors;
    }

    public function validateFans($fans,$case,$mobo,$errors,$errors_components,$warnings)
    {
        $fans_1 = $warningsM = $allErrors =  array();
        if(count($fans) > 0 ){
            $num_fans = count($fans);
            if($case != ''){
                if($num_fans > $case->fans){
                    array_push($fans_1,'Too high fan count, this case supports up to '.$case->fans.' fans');
                    array_push($errors_components,'fans','case');
                }
            }
            if($mobo != ''){
                if($num_fans > $mobo->fan_headers){
                    array_push($warningsM,'It is possible to plug in all the fans, however, those that are going to be connected directly to the PSU are not going to have the ability to control the fan speed.');
                }
            }
        }
      
        $errors['fans'] = $fans_1;
        $warnings['fans'] = $warningsM;
        array_push($allErrors,$errors_components,$errors,$warnings);
        return $allErrors;
    }

    public function validateCooler($cooler,$case,$errors,$errors_components,$warnings)
    {
        $cooler_1 = $warningsM = $allErrors =  array();
        if($cooler != '' && $case != ''){
            $max_height = $case->width - 15;
            if($cooler->water_cooled == 0){
                if($cooler->height > $max_height){
                    array_push($cooler_1,'Height of the Cooler is higher the the max supported height of the Cooler for this case. Max Cooler height that this Case supports is:' . $max_height);
                    array_push($errors_components,'cooler','case');
                }
            }
            else{
                if($case->water_cooling == 0){
                    array_push($cooler_1,'This Case has no support for water cooling.');
                    array_push($errors_components,'cooler','case');
                }
                elseif($cooler->water_cooled == 2 && $case->water_cooling == 1){
                    array_push($cooler_1,'This Case only supports 2x140mm Water Coolers.');
                    array_push($errors_components,'cooler','case');
                }
            }
        }
       
        $errors['cooler'] = $cooler_1;
        $warnings['cooler'] = $warningsM;
        array_push($allErrors,$errors_components,$errors,$warnings);
        return $allErrors;
    }

    public function validateStorage($storages,$case,$mobo,$errors,$errors_components,$warnings)
    {
        $storages_1 = $warningsM = $allErrors =  array();
        if(count($storages) > 0){
            $num_hdd = $num_ssd = $num_m2 = 0;
            foreach($storages as $storage){
                if($storage->type == 'HDD'){
                    $num_hdd++;
                }
                else{
                    if($storage->nvme == 1){
                        $num_m2++;
                    }
                    else{
                        $num_ssd++;
                    }
                }
            }
            if($case != ''){
                if($num_hdd > $case->num_3_5_bays){
                    array_push($storages_1,'Not enough bays for Hard Drives, number of bays for Hard Drives in this Case: ' . $case->num_3_5_bays);
                    array_push($errors_components,'storages','case');
                }
                if($num_hdd > $case->num_2_5_bays){
                    array_push($storages_1,'Not enough bays for SSDs, number of bays for SSDs in this Case: ' . $case->num_2_5_bays);
                    array_push($errors_components,'storages','case');
                }
            }
            if($mobo != ''){
                if($num_hdd + $num_ssd > $mobo->sata_ports){
                    
                    array_push($storages_1,'Number of devices is greater the the number of SATA ports. Number of SATA ports on this Motherboard: ' . $mobo->sata_ports);
                    array_push($errors_components,'storages','mobo');
                }
                if($num_m2 > $mobo->m_2_slots){
                    array_push($storages_1,'Not enough M.2 slots, number of M.2 slots on this Motherboard: ' . $mobo->m_2_slots);
                    array_push($errors_components,'storages','mobo');
                }
            }
        }
        $errors['storages'] = $storages_1;
        $warnings['storages'] = $warningsM;
        array_push($allErrors,$errors_components,$errors,$warnings);
        return $allErrors;
       
    }

    public function validateRam($rams,$mobo,$errors,$errors_components,$warnings)
    {
       
        $rams_1 = $warningsM = $allErrors =  array();
        $num_rams = count($rams);
        
        $capacity = 0;
        if($num_rams > 0){
            
            if($num_rams != 4 && $num_rams != 2){
                array_push($warningsM,'Dual Channel or Quad Channel will be disabled if there are not going to be 2 or 4 memory modules in the build.');
                array_push($errors_components,'rams');
               
            }
            foreach($rams as $ram){
                if($ram->id == $rams[0]->id){
                    array_push($warningsM,'Possible risk of system instability due to the different memory modules that are being used, if the modules have different rated speeds then all the modules will run on the speed of the slowest module.');
                    //array_push($errors_components,'rams');
                    
                }
                $capacity += $ram->size;
            }
            if($mobo != ''){
                if($mobo->memory_slots < $num_rams){
                    array_push($rams_1,'Not enought DIMM slots on this Motherboard, it supports up to: ' . $case->memory_slots . ' modules');
                    array_push($errors_components,'mobo','rams');
                }
                foreach($rams as $ram){
                    if($mobo->memory_type != $ram->type){
                     
                        array_push($rams_1,'This memory module is not compatible with this Motherboard, type of memory: '. $ram->type .'supported type: '. $mobo->memory_type );
                        array_push($errors_components,'mobo','rams');
                    }
                }
                if($mobo->max_memory < $capacity){
                    array_push($rams_1,'Motherboard supports up to: ' . $mobo->max_memory . ' GB');
                    array_push($errors_components,'mobo','rams');
                }
                
            }
            
        }
        $errors['rams'] = $rams_1;
        $warnings['rams'] = $warningsM;
        array_push($allErrors,$errors_components,$errors,$warnings);
        return $allErrors;
       
    }
    
}
