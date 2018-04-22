<select class="s2-select-search form-control" name="kecamatan" onchange="getwilayah(this.value,'kelurahan')">
    <option>-Kecamatan-</option>
    @foreach ($kecamatan as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach          
</select>