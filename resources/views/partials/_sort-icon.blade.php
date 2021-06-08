@if ($sortBy !== $field)
    <i class="text-muted text-white mr-2 fas fa-sort"></i>
@elseif($sortDirection == 'asc')    
    <i class="text-muted text-green-300 mr-2 fas fa-sort-up"></i>
@else
    <i class="text-muted text-green-400 mr-2 fas fa-sort-down"></i>
@endif