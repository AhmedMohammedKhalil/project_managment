@extends('users.layout',['page_name'=>'تعديل كتاب'])

@section('section')
    <livewire:user.project.edit :project_id="$project_id"/>
@endsection
