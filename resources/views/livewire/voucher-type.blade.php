<div>
    <label class="form-label" for="type">Type</label>
    <select class="form-control" id="type" wire:model.lazy="type">
        <option @if($type === 'Amount') selected @endif value="Amount">
            Amount
        </option>
        <option @if($type === 'Percentage') selected @endif value="Percentage">
            Percentage
        </option>
    </select>
</div>
