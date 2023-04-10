@if(auth()->user()?->is_admin)
<div class="hidden w-full md:block text-sm text-white font-bold mt-2" >
    <form action="/logout" class='float-right nav-link' method="post">
        @csrf
        <input type="submit" value="LOGOUT">
    </form>
    <a href='/program/create' class='float-right nav-link'>CREATE PROGRAM</a>
    <a href='/gallery/create' class='float-right nav-link'>CREATE GALLERY</a>
    <a href='/applicants' class='float-right nav-link'>APPLICANTS</a>
</div>
@endif