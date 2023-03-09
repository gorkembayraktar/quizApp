<x-app-layout>
    <x-slot name="header">Quiz Güncelle </x-slot>


    @if($errors->any())
      @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach

    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('quizzes.update', $quiz->id)}}">
              @method('PUT')
              @csrf

              <div class="form-group">
                <label for="">Quiz Başlık</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $quiz->title)}}" >
              </div>
              <div class="form-group">
                <label for="">Quiz Açıklama</label>
                <textarea name="description" class="form-control">{{ old('description', $quiz->description)}} </textarea>
              </div>
              <div class="form-group">
                <label for="">Durum</label>
                <select name="status" id="">
                  <option value="publish" @selected($quiz->status == 'publish')>Aktif</option>
                  <option value="passive" @selected($quiz->status == 'passive')>Pasif</option>
                  <option value="draft" @selected($quiz->status == 'draft')>Taslak</option>
                </select>
              </div>
              <div class="form-group">
                <input type="checkbox" name="" id="bitistarih" @if(!empty($quiz->finished_at)) checked @endif>
                <label for="bitistarih">Bitiş Tarihi Ekle</label>
              </div>
              <div class="form-group"   @if(empty($quiz->finished_at)) style='display:none' @endif id="bitisTarihiContainer">
                <label for="">Bitiş tarihi</label>
                <input type="datetime-local" name="finished_at" class="form-control" value="{{ old('finished_at', $quiz->finished_at)}}">
              </div>
              <div class="form-group">
                <button class="btn btn-sm  btn-block btn-success">Quiz Güncelle</button>
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
