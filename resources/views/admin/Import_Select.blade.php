@extends('layout.master')

@section('content')
    <div class="flex w-full justify-center">
        <div class="card rounded bg-white p-4 shadow">
            <h2 class="mb-2 text-lg font-bold">Importa</h2>
            <hr>
            <br>
<form action="{{ route('import.submit') }}" enctype="multipart/form-data" method="post">
    
    <div class="bg-warning-100 text-warning-800 mb-3 inline-flex w-full items-center rounded-lg px-6 py-5 text-base"
    role="alert">
    <span class="mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
            <path fill-rule="evenodd"
                d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                clip-rule="evenodd" />
        </svg>
        supportiamo file Excel (formato .xlsx).
    </span>

</div>
<br>
<div class="mb-3">
    <label for="formFileLg" class="mb-2 inline-block text-neutral-700 dark:text-neutral-200">Choose File</label>
    <input
        class="focus:border-primary focus:shadow-te-primary dark:focus:border-primary relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:text-neutral-700 focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100"
        id="formFileLg" type="file" accept=".xlsx" name="file"/>

</div>

<button type="submit"
class="bg-primary-100 text-primary-700 hover:bg-primary-accent-100 focus:bg-primary-accent-100 active:bg-primary-accent-200 inline-block rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal transition duration-150 ease-in-out focus:outline-none focus:ring-0">
Submit
</button>
@csrf
</form>
        </div>
    </div>
@endsection
