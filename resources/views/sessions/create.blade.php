<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In!</h1>

                <form class="mt-10" method="POST" action="/sessions">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="email"/>
                    <x-form.input name="password" type="password"/>

                    <x-form.button>Submit</x-form.button>

                </form>
            </x-panel>
        </main>
    </section>
</x-layout>