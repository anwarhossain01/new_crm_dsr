<div class="grid grid-cols-2">

    <div class="text-center">
        <label for="">{{ $title }}</label>
    </div>

    <div class="grid grid-cols-4 gap-2">

        <div>
            <input type="checkbox" name="" class="h-4 w-4 rounded-full shadow">
        </div>

        <select data-te-select-init>
            @foreach ($selection as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
            
        </select>

        <div class="relative mb-3" data-te-input-wrapper-init>
            <input type="text"
                class="bg-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="exampleFormControlInput1" placeholder="Example label" name="{{ $name }}" />
            <label for="exampleFormControlInput1"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Input
                here
            </label>
        </div>

    </div>
</div>