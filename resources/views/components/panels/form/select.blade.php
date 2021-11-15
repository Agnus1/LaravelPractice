@props(['name', 'id', 'options'])
<select id="{{$id}}" name="{{$name}}" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    @foreach($options as $option)
        <option>{{$option}}</option>
    @endforeach
</select>
