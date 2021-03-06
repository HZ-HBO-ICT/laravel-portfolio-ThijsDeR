@extends('layout')
    
@section('head-content')
    <link rel="stylesheet" href="/css/form/editStyles.css">
    <script src="/js/createfaqScript.js" defer></script>
@endsection('head-content')


@section('content')
    <main id="main">
        <form id="edit" method="POST" action="{{route('faq.update', $faq->id)}}">
            @csrf
            @method('put')
            <div class="field">
                <label for="question" class="label">Question:</label>
                <input type="text" name="question" class="input" id="question" value="{{$faq->question}}" required>
            </div>

            <div class="field">
                <label for="link" class="label">Link:</label>
                <input type="text" name="link" class="input" id="link" value="{{$faq->link}}">
            </div>

            <div class="field">
                <label for="body" class="label">body:</label>
                <textarea class="textarea" name="body" id="body" cols="30" rows="10" required>{{$faq->body}}</textarea>
            </div>

            <div id="buttons">
                <div class="button" id="cancel">
                    <a href="{{route('faq.show', $faq->id)}}">Cancel</a>
                </div>
                <div class="button" id="submit">
                    <button type="submit">Submit</button>
                </div>
            </div>
        </form>

        <form id="delete" method="POST" action="{{route('faq.destroy', $faq->id)}}">
            @csrf
            @method('DELETE')
            <div id="buttons">
                <div class="button" id="delete">
                    <button type="submit">Delete</button>
                </div>
            </div>
        </form>
    </main>
@endsection('content')