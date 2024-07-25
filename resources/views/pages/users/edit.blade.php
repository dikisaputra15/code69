@extends('layouts.app')

@section('title', 'Users')

@push('style')

@endpush

@section('main')
<h1 class="h3 mb-2 text-gray-800">Edit User</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group">
                                <label>Nama Warung</label>
                                <select class="form-control" name="id_warung">
                                    <?php
                                        foreach ($warungs as $warung) {

                                        if ($warung->id==$user->id_warung) {
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }

                                     ?>
                                        <option <?php echo $select; ?> value="<?php echo $warung->id;?>"><?php echo $warung->nama_warung; ?></option>

                                     <?php } ?>

                                </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Roles</label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="roles" value="admin" class="radio"
                            @if ($user->roles == 'admin') checked @endif>
                            Admin
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="roles" value="penjual" class="radio"
                            @if ($user->roles == 'penjual') checked @endif>
                            Penjual
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="roles" value="pemilik" class="radio"
                            @if ($user->roles == 'pemilik') checked @endif>
                            Pemilik
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection

@push('scripts')

@endpush
