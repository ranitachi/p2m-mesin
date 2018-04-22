<select class="s2-select-search form-control" name="kabupaten_kota" onchange="getwilayah(this.value,'kecamatan')">
    <option>-Kabupaten Kota-</option>
    @foreach ($kota as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
    @endforeach          
</select>