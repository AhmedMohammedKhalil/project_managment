@extends('users.layout',['page_name'=>'Edit Project'])

@section('section')
    @livewire('user.project.edit',['project_id' => $project_id])
@endsection
