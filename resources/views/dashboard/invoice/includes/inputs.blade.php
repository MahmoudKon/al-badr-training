
<div class="card-body">
    @csrf
    <div class="form-group mb-3">
        <label class="form-label required">client Name</label>
        <div class="input-icon">
            <select name="client" class="form-control select2">
                <option value="">---</option>
                @foreach ($clients as $id => $name)
                    <option value="{{ $id }}" {{ isset($row) && $row->client == $id    ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'client'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label">Dealing Date</label>
        <input class="form-control mb-2" placeholder="Select a date" id="datepicker-default" value="2020-06-20"/>

    </div>
    <!-- invoice Id-->
    <!-- <div class="form-group mb-3">
        <label class="form-label required">Invoice_ID</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->invoice_id ?? '' }}" name="invoice_id" class="form-control" placeholder="Item invoice_ID..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'invoice_id'])
    </div> -->
    <div class="form-group mb-3">
        <label class="form-label required">Item</label>
        <div class="input-icon" id="itemBlock">
            <select name="items[]" class="form-control select2" id="items">
                <option value="">---</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" {{-- isset($row) && $row->item == $id    ? 'selected' : '' --}}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <br/>
        <button class="btn btn-sm btn-primary" type="button" id="addItem">  + Add new item</button>
        <button class="btn btn-sm btn-danger" type="button" id="removeItem">- Remove last item</button>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'item'])
    </div>

                <!--Section Information related to item-->
    <!-- <div class="form-group mb-3">
        <label class="form-label required">Item description</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->description ?? '' }}" name="description" class="form-control" placeholder="Item description..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'description'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Item price</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->price ?? '' }}" name="price" class="form-control" placeholder="price..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'price'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Item Quantity</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->qty ?? '' }}" name="qty" class="form-control" placeholder="Item Quantity..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'qty'])
    </div>
    <div class="form-group mb-3">
        <label class="form-label required">Unit</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->unit ?? '' }}" name="unit" class="form-control" placeholder="Item unit..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'unit'])
    </div> -->

    <div class="form-group mb-3">
        <label class="form-label required">Store</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->store ?? '' }}" name="store" class="form-control" placeholder="store..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'store'])
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">net_invoice</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->store ?? '' }}" name="store" class="form-control" placeholder="store..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        <!-- @include('layouts.includes.dashboard.validation-error', ['input' => 'store']) -->
    </div>

    <div class="form-group mb-3">
        <label class="form-label required">Total</label>
        <div class="input-icon">
            <input type="text" value="{{ $row->store ?? '' }}" name="store" class="form-control" placeholder="store..." autofocus>
            <span class="input-icon-addon"> <i class="fa-solid fa-list"></i> </span>
        </div>
        <!-- @include('layouts.includes.dashboard.validation-error', ['input' => 'store']) -->
    </div>



</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info"> Save <i class="fas fa-save"></i> </button>
</div>
@push('js')
<script>
    $(function(){
        $("#removeItem").hide();
        //when the addItem Field button is clicked
        $("#addItem").click(function(e){
            $("#removeItem").fadeIn("1500");
            //Append new field of items
            let items = $("#items");

            $('itemBlock').append(items);
        });

        // $("#items").on('change', function(){
        //     var selected = $("#items option:selected").val();
        //     console.log(selected);
        //     if(selected == ''){
        //         console.log('nothing selected yet')
        //     }
        // });
        $("#items").select2().on('select2:select', function(e){

        });
    });


</script>
@endpush
