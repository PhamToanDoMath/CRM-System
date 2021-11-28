<div>
    <div class="form-check form-switch">
        <label for="is_enable"></label>
        <input class="form-check-input" wire:model.lazy="isActive" style="margin-left:auto" type="checkbox" id="is_enable" role="switch" @if($isActive) checked @endif>
    </div>
</div>

