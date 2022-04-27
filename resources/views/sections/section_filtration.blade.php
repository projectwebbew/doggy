<div class="left_part">
    <form class="checkBoxForm" action="{{route('front-home')}}" method="GET">
        <div class="container">
            <h4>Gender</h4>
            @php
                $gender_array=request()->get('gender',[]);
            @endphp
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" name="gender[]" class="form-check-input" value="female"
                           id="checkFemale"
                           @if(in_array('female',$gender_array)) checked @endif >
                    <label class="form-check-label" for="checkFemale">
                        Female
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" name="gender[]" class="form-check-input" value="male"
                           id="checkMale"
                           @if(in_array('male',$gender_array)) checked @endif >
                    <label class="form-check-label" for="checkMale">
                        Male
                    </label>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-success"> Submit</button>
    </form>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Available Puppies
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Nursery
        </label>
    </div>
    <div class="btn btn-success">Price from UP &uArr;</div>
    <div class="btn btn-danger" style="margin-top: 10px">Price from DOWN &dArr;</div>
</div>
