<form  action="{{ route('TypeDepRegister') }}" method="POST" enctype="multipart/form-data">
              @csrf

          

       <div class="form-group"><label>Type Departement</label>
        <select id="typeDep" type="text" class="form-control{{ $errors->has('typeDep') ? ' is-invalid' : '' }}" name="typeDep" value="{{ old('typeDep') }}" >
            
          <option>
            
          </option>

       </select>

          @if ($errors->has('typeDep'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('typeDep') }}</strong>
              </span>
          @endif
       </div>
          

              <div>
                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="submit"><strong>Creer le departement</strong></button>
              </div>
              
</form>