<div class="form-group mt-4 mb-4">
    <div class="captcha">
        <span>{!! captcha_img() !!}</span>
    </div>
    <div class="mt-1">
        <input id="captcha" type="text" class="form-control" placeholder="Doğrulama kodu"
               name="captcha">
        @error('captcha')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
