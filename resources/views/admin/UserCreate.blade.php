@extends('layout.master')

@section('content')

    @if (session('error'))
        <div class="bg-danger-100 text-danger-700 mb-4 rounded-lg px-6 py-5 text-base" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-danger-100 text-danger-700 mb-4 rounded-lg px-6 py-5 text-base">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="grid place-items-center blocco">
        <div
            class="block w-full rounded-lg border bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] md:w-96">
            <form method="post" action="{{ route('user.new.submit') }}">
                @csrf
                <div class="relative mb-6" data-te-input-wrapper-init>
                    <input type="text" required
                        class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="exampleInputEmail3" placeholder="Enter username" name="username" />
                    <label for="exampleInputEmail3"
                        class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">Nome</label>
                </div>

                <div class="relative mb-6" data-te-input-wrapper-init>
                    <input type="email" required
                        class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Mail" name="email" />
                    <label for="exampleInputEmail2"
                        class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">Mail</label>
                </div>

                <!--Password input-->
                <div class="relative mb-6" data-te-input-wrapper-init>
                    <input type="password" required onkeyup="checkPass();" id="password"
                        class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        placeholder="Password" name="password" />
                    <label for="password"
                        class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">Password</label>
                </div>

                <div class="relative mb-6" data-te-input-wrapper-init>
                    <input type="password" required onkeyup="checkPass();"
                        class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                        id="exampleInputPassword2" placeholder="Re-inserisci la password" name="password_confirmation" />
                    <label for="exampleInputPassword2"
                        class="peer-focus:text-primary dark:peer-focus:text-primary pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200">Re-inserisci
                        la password</label>
                </div>

                <div class="mb-6 hidden" id="passwordErrorText">
                    <p class="text-sm text-red-500">Passwords do not match !</p>
                </div>

                <select data-te-select-init required name="Gruppo">
                    <option selected value="Admin">Admin</option>
                    <option value="User">Utente</option>

                </select>
                <label data-te-select-label-ref>Gruppo di utenti</label>
                <br>
                <!--Sign in button-->
                <button type="submit"
                    class="button-main"
                    data-te-ripple-init data-te-ripple-color="light">
                    Invia
                </button>

            </form>
        </div>
    </div>


    <script>
        function checkPass() {
            let password = document.getElementById("password").value;
            let confirm_password = document.getElementById("exampleInputPassword2").value;

            if (!password || !confirm_password) {
                return;
            }

            if (password != confirm_password) {
                document.getElementById("passwordErrorText").classList.remove("hidden");
                document.getElementById("passwordErrorText").style.display = "block";
            } else {
                document.getElementById("passwordErrorText").classList.add("hidden");
                document.getElementById("passwordErrorText").style.display = "none";
            }
        }
    </script>
@endsection
