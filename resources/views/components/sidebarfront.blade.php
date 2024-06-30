<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Online</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <div class="sidebar-heading">
        List Warung
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>List Warung</span>
        </a>
        @php
            $warungs = DB::table('warungs')->get();
        @endphp
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @foreach ($warungs as $warung)
                    <a class="collapse-item" href="/warung/{{$warung->id}}/pilihwarung">{{$warung->nama_warung}}</a>
                @endforeach
            </div>
        </div>
    </li>

    <!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Kategori
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-folder"></i>
        <span>Kategori</span>
    </a>
    @php
        $kategoris = DB::table('kategoris')->get();
    @endphp
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            @foreach ($kategoris as $kategori)
                <a class="collapse-item" href="/kategori/{{$kategori->id}}/pilihkategori">{{$kategori->nama_kategori}}</a>
            @endforeach
        </div>
    </div>
</li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


    </ul>
