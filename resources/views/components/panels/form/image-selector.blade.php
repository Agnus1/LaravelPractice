@props(['name', 'id'])
<input type="file" id="{{$id}}" style="padding:10px" name="{{$name}}" onchange="readURL(this);">
<img id="image_preview" style="max-width:180px"/>
