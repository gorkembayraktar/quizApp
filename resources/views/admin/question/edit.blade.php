<x-app-layout>
    <x-slot name="header">{{ $question->question }} Düzenle </x-slot>


    @if($errors->any())
      @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach

    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('questions.update', [$question->quiz_id, $question->id])}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="">Soru</label>
                <textarea name="question" class="form-control">{{ old('question', $question->question)}} </textarea>
              </div>
              <div class="form-group">
                @isset($question->image)
                <img src="{{ asset($question->image)}}" class='img-response' width="200" alt="">
                @endisset
                <label for="">Fotoğraf</label>
                <input type="file" name="image" class="form-control" >
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Cevap 1</label>
                        <textarea name="answer1" class="form-control">{{ old('answer1', $question->answer1)}} </textarea>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Cevap 2</label>
                      <textarea name="answer2" class="form-control">{{ old('answer2', $question->answer2)}} </textarea>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Cevap 3</label>
                      <textarea name="answer3" class="form-control">{{ old('answer3', $question->answer3)}} </textarea>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Cevap 4</label>
                    <textarea name="answer4" class="form-control">{{ old('answer4', $question->answer4)}} </textarea>
                  </div>
              </div>
            </div>
          
            <div class="form-group">
              <label for="">Doğru Cevap</label>
              <select class="form-control" name="correct_answer">
                  <option value="answer1" @selected(old('correct_answer', $question->answer1) == 'answer1')>1.cevap</option>
                  <option value="answer2" @selected(old('correct_answer', $question->answer2) == 'answer2')>2.cevap</option>
                  <option value="answer3" @selected(old('correct_answer', $question->answer3) == 'answer3')>3.cevap</option>
                  <option value="answer4" @selected(old('correct_answer', $question->answer4) == 'answer4')>4.cevap</option>
              </select>  
            </div>
              <div class="form-group">
                <button class="btn btn-sm  btn-block btn-success">Soruyu güncelle</button>
              </div>

            </form>
           
        </div>
    </div>

    
</x-app-layout>
