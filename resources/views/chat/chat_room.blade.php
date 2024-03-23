@extends('layouts.app')
@section('css')
@endsection("css")
@section('chat')
    <div class="container-fluid body h-100">
        <div class="row">
            <div class="chat pepole">
                <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header">
                        <div class="input-group">
                            <input type="text" placeholder="Search..." name="" class="form-control search" />
                            <div class="input-group-prepend">
                                <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body contacts_body">
                        <ul class="contacts">
                            @include("chat.contacts")

                        </ul>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="chat message">
                @include("chat.chat_message")
            </div>
        </div>


@endsection("chat")
