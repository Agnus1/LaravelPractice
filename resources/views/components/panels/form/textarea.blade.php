@props(['name', 'id'])
<textarea id="{{$id}}" name="{{$name}}" class="mt-1 block w-full rounded-md border-{{$errors->has($name) ? 'red-600' : 'gray-300'}} shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3"></textarea>
