<x-app-layout>
    <x-slot name="header">Quiz Oluştur </x-slot>


    @if($errors->any())
      @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach

    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('quizzes.store')}}">
              @csrf

              <div class="form-group">
                <label for="">Quiz Başlık</label>
                <input type="text" name="title" class="form-control" value="{{ old('title')}}" >
              </div>
              <div class="form-group">
                <label for="">Quiz Açıklama</label>
                <textarea name="description" class="form-control">{{ old('description')}} </textarea>
              </div>
              <div class="form-group">
                <input type="checkbox" name="" id="bitistarih">
                <label for="bitistarih">Bitiş Tarihi Ekle</label>
              </div>
              <div class="form-group" style='display:none' id="bitisTarihiContainer">
                <label for="">Bitiş tarihi</label>
                <input type="datetime-local" name="finished_at" class="form-control" value="{{ old('finished_at')}}">
              </div>
              <div class="form-group">
                <button class="btn btn-sm  btn-block btn-success">Quiz Oluştur</button>
              </div>

            </form>
           
        </div>
    </div>

    <x-slot name="js">

      <script>

        document.addEventListener('DOMContentLoaded', function(){
          $("#bitistarih").change(function(){
                 $("#bitisTarihiContainer")[$(this).is(':checked') ? 'show' : 'hide']();
          });
        });

      </script>
    </x-slot>
    
</x-app-layout>
