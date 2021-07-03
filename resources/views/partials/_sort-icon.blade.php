@if ($sortBy !== $field)
    <i class="text-muted  mr-2 fas fa-sort"></i>
@elseif($sortDirection == 'asc')    
    <i class="text-muted  mr-2 fas fa-sort-up"></i>
@else
    <i class="text-muted  mr-2 fas fa-sort-down"></i>
@endif