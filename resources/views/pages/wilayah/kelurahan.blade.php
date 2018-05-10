<select class="s2-select-search form-control" name="kelurahan">
    <option value="0">-Kelurahan-</option>
    @foreach ($kelurahan as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach          
</select>