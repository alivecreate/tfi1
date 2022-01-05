
                  <div class="form-group row">
                    <div class="col-sm-12 row">
                        <div class="col-6">
                        <label  class="col" class="text-danger" for="image">Featured Image</label>
                        <input type="file"  name="image" 
                        placeholder="Featured Image"
                         value="@if(old('image')){{old('image')}}@else{{$pageData->image}}@endif"
                         
                         accept="image/png,image/jpeg" />

                        <input type="hidden" name="old_image" value="{{$pageData->featured_image}}">

                        <span class="text-danger"></span>

                        <p class="text-danger">
                          Image size should be( 400Px   X   400Px ).<br>
                          Supportable Format: JPG,JPEG,PNG.<br>
                          <span>* </span>This Image will Display in OG Tag
                        </p>
                        </div>
                        <div class="col-6">

                          @if($pageData->featured_image)
                          <img class="object-fit"  height="120"
                            src="{{asset('web')}}/media/xs/{{$pageData->featured_image}}">
                            @else
                            <img class="elevation-2"  height="120"
                          src="{{asset('adm')}}/img/no-item.jpeg">
                            @endif
                          </div>

                      </div>
                    </div>
                    
                    
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="image_alt">Image Alt</label>
                        <input type="text" class="form-control" name="image_alt" 
                          placeholder="Image Alter Text (SEO)"   
                          value="@if(old('image_alt')){{old('image_alt')}}@else{{$pageData->image_alt}}@endif">
                      
                          
                        <span class="text-danger">@error('image_alt') {{$message}} @enderror</span>
                      </div>
                      
                      <div class="col-sm-6">
                        <label for="image_title">Image Title</label>
                        <input type="text" class="form-control" name="image_title" 
                          placeholder="Image Title (SEO)" 
                          value="@if(old('image_title')){{old('image_title')}}@else{{$pageData->image_title}}@endif">
                      
                          
                        <span class="text-danger">@error('image_title') {{$message}} @enderror</span>
                      </div>
                    </div>
                    
