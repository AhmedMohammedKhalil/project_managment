@extends('users.layout',['page_name'=>'تعديل كتاب'])

@section('section')
    <livewire:user.book.edit :book_id="$book_id"/>
@endsection
