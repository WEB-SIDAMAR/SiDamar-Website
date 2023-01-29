@extends('layouts.main')

@section('container')
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
        <div>
            {{-- <img class="mx-auto h-12 w-auto" src="img/logo.png" alt="Si Damar"> --}}
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-primary">Sign in to your account</h2>
        </div>
        <form class="mt-8 space-y-6" action="#" method="POST">
            <input type="hidden" name="remember" value="true">
            <div class="-space-y-px rounded-md shadow-sm">
            <div>
                <label for="email-address" class="sr-only">Email address</label>
                <input id="email-address" name="email" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-primary focus:outline-none focus:ring-prborder-primary sm:text-sm" placeholder="Email address">
            </div>
            <div>
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-primary focus:outline-none focus:ring-prborder-primary sm:text-sm" placeholder="Password">
            </div>
            </div>

            <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primaryDarken focus:ring-prborder-primary">
                <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
            </div>

            <div class="text-sm">
                <a href="#" class="font-medium text-primary hover:text-primaryLighten">Forgot your password?</a>
            </div>
            </div>

            <div>
            <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-primary py-2 px-4 text-sm font-medium text-white hover:bg-primaryDarken focus:outline-none focus:ring-2 focus:ring-primaryLighten focus:ring-offset-2">
                Sign in
            </button>
            </div>
        </form>
        </div>
    </div>
@endsection

