<div class="mb-3">
    <label for="" class="form-label">{{$label}}</label>
    <input type="{{$type}}" class="form-control" name="{{$name}}" id="" aria-describedby="helpId"  value="{{$value}}">
    <span class="text-danger">
        @error($name)
            {{$message}}
        @enderror
    </span>
</div>
