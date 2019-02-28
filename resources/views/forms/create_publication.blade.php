<form  action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
              @csrf

          <div class="form-group"><label>Titre de la publication</label> 
                  <input id="Titre" type="text" class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}" name="titre" value="{{ old('titre') }}" required autofocus>

             @if ($errors->has('titre'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('titre') }}</strong>
              </span>
             @endif
          </div>

       <div class="form-group"><label>Departement</label>
        <select id="departement" type="text" class="form-control{{ $errors->has('departement') ? ' is-invalid' : '' }}" name="departement" value="{{ old('departement') }}" >
            
          <option>
            
          </option>

       </select>

          @if ($errors->has('departement'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('departement') }}</strong>
              </span>
          @endif
       </div>
               
              <div class="form-group"><label>Contenu</label>
                  <textarea id="contenu" type="text" class="form-control{{ $errors->has('contenu') ? ' is-invalid' : '' }}" name="contenu" value="{{ old('contenu') }}" required>

                </textarea> 

                @if ($errors->has('contenu'))
                 <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('contenu') }}</strong>
                 </span>
               @endif
             </div>
          

              <div>
                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="submit"><strong>Suivant</strong></button>
              </div>
              
          </form>