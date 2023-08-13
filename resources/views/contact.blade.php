@extends('layouts.guest')

@section('body')
<section class="min-h-screen bg-orange-50 pt-24">
    <div class="w-full md:w-2/3 mx-auto p-4">
        <h1 class="mt-32 text-center">Contact Us</h1>
        <p class="mt-8 leading-relaxed text-slate-600 text-center">Feel free to place your queries. Our support team is quick to respond, ensuring that no question goes unanswered.</p>

        <div class="flex flex-wrap items-center justify-center mt-16 gap-4">

            <a href="https://wa.me/+923044933477" target="_blank">
                <i class="bi bi-whatsapp text-teal-600"></i>
                <span class="ml-2">+92 304 4933477</span>
            </a>
            <a href="https://web.facebook.com/AntiqueJasper?_rdc=1&_rdr" target="_blank"><i class="bi bi-facebook text-indigo-600 ml-16"></i></a>
            <a href="https://www.instagram.com/antique_jasper/" target="_blank"><i class="bi bi-instagram text-teal-600 ml-3"></i></a>
            <a href="https://www.tiktok.com/@antiquejasper2" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-tiktok ml-3" viewBox="0 0 16 16">
                    <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z" />
                </svg>
            </a>
        </div>

    </div>

</section>
@endsection