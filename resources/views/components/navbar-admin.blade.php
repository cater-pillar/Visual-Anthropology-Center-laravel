@if(auth()->user()?->is_admin)
<div class='flex flex-col md:hidden text-sm text-white font-bold mt-5' x-cloak x-show="open" @click.away="open = false" x-transition>
    <a href='/program/create' class='nav-link'>CREATE PROGRAM</a>
    <a href='/gallery/create' class='nav-link'>CREATE GALLERY</a>
    <a href='/applicants' class='float-right nav-link'>APPLICANTS</a>
    <a href='/galleries/trash' class='float-right nav-link'>TRASH GALLERIES</a>
    <a href='/programs/trash' class='float-right nav-link'>TRASH PROGRAMS</a>
    <form action="/logout" class='float-right nav-link' method="post">
        @csrf
        <input type="submit" value="LOGOUT">
    </form>
</div>
@endif