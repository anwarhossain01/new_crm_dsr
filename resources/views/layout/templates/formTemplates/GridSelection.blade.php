<div class="grid grid-cols-2 mb-2">

    <div class="text-center">
        <label for="">{{ $title }}</label>
    </div>

    <div class="grid grid-cols-4 gap-2">

        <div>
            <input type="checkbox" name="" class="h-4 w-4 rounded-full shadow">
        </div>

        <select data-te-select-init>
            @foreach ($selection1 as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
            
        </select>

        <select data-te-select-init>
            @foreach ($selection2 as $key => $value)
            <option value="{{ $value->ID }}">{{ $value->Nome }}</option>
            @endforeach
            
        </select>

    </div>
</div>