@extends('layouts.app')

@section('content')

    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>Food Menu</h2>
            </div>
        </div>
    </div>

    <!-- Notice
    <div class="row">
        <div class="col-md-12">
            <div class="notification success closeable margin-bottom-30">
                <p>Your listing <strong>Hotel Govendor</strong> has been approved!</p>
                <a class="close" href="#"></a>
            </div>
        </div>
    </div> -->

    @if(isset($foodCategories))

    <div class="row">
        <div class="col-md-12">
            @if(count($foodCategories) < 1)
                <div class="row">
                    <div class="col-md-8">
                        <h4>No food item found.</h4>  
                    </div>
                    <div class="col-md-4" align="right">
                        <a href="{{ route('fooditem.add', $code) }}" class="button border with-icon">Add <i class="sl sl-icon-plus"></i></a>
                    </div>
                </div>
            @else
                <div class="add-listing">
                    <div class="add-listing-section">
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i>Pricing ({{ \App\Restaurant::where('code', $code)->first()->name }})</h3>
                        </div>

                        <table id="pricing-list-container">
                            <tbody>
                                
                                @foreach($foodCategories as $foodCategory)
                                    <tr class="pricing-list-item pricing-submenu">
                                        <td>
                                            <div class="fm-input" style="margin-right: 10px;"><input type="text" placeholder="" value="{{ $foodCategory->name }}" disabled></div>

                                                
                                                <button href="#category-{{ $foodCategory->id }}" class="button popup-with-zoom-anim" style="max-height: 44px;"><i class="sl sl-icon-note"></i></button>

                                                <div id="category-{{ $foodCategory->id }}" class="zoom-anim-dialog mfp-hide small-dialog">
                                                    <div class="small-dialog-header">
                                                        <h3>Eidt Category</h3>
                                                    </div>
                                                    <div class="message-reply margin-top-0">
                                                        <form  method="POST" action="{{ route('food.category.update') }}">
                                                         @csrf
                                                            <input type="hidden" name="id" value="{{ $foodCategory->id }}">
                                                            <input type="text" name="name" value="{{ $foodCategory->name }}">
                                                            <input type="hidden" name="code" value="{{ $code }}">
                                                            <button class="button">Save</button>  
                                                        </form>
                                                    </div>
                                                </div>


                                                <form method="POST" action="{{ route('food.category.delete') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $foodCategory->id }}">
                                                    <button class="button"><i class="sl sl-icon-close"></i></button>
                                                </form>  
                                        </td>
                                    </tr>

                                    @foreach($foodCategory->foodItems as $foodItem)

                                        <tr class="pricing-list-item pattern ui-sortable-handle">
                                            <td>
                                                
                                                <div class="fm-input pricing-name"><input type="text" placeholder="" value="{{ $foodItem->name }}" disabled></div>
                                                <div class="fm-input pricing-ingredients"><input type="text" placeholder="" value="{{ $foodItem->description }}" disabled></div>
                                                <div class="fm-input pricing-price" style="margin-right: 10px;"><i class="data-unit">USD</i><input type="text" placeholder="" value="{{ $foodItem->price }}" data-unit="Euro" disabled></div>

                                                <form method="POST" action="{{ route('fooditem.edit') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $foodItem->id }}">
                                                    <button class="button"><i class="sl sl-icon-note"></i></button>
                                                </form>

                                                <form method="POST" action="{{ route('fooditem.delete') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $foodItem->id }}">
                                                    <button class="button"><i class="sl sl-icon-close"></i></button>
                                                </form> 
                                                
                                            </td>
                                        </tr>

                                    @endforeach

                                @endforeach

                            </tbody>
                        </table>
                        

                    </div>
                </div>

            @endif

            <div class="add-listing">
                <div class="add-listing-section">
                    <a href="{{ route('fooditem.add', $code) }}" class="button">Add Item</a>
                    <a href="#test" class="button popup-with-zoom-anim">Add Category</a>
                </div>
            </div>
            
            <div id="test" class="zoom-anim-dialog mfp-hide small-dialog">
                <div class="small-dialog-header">
                    <h3>Add Category</h3>
                </div>
                <div class="message-reply margin-top-0">
                    <form  method="POST" action="{{ route('food.category.add') }}">
                     @csrf
                        <input type="text" name="name" placeholder="Category Name">
                        <input type="hidden" name="code" value="{{ $code }}">
                        <button class="button">Save</button>  
                    </form>
                </div>
            </div>

        </div>
    </div>

    @endif

<!-- Copyrights -->
<div class="col-md-12">
    <div class="copyrights">© 2021 Rizervo. All Rights Reserved.</div>
</div>

@endsection
