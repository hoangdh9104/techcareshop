@php
    $categoryProductSliderSectionThree = json_decode(optional($categoryProductSliderSectionThree)->value, true) ?? [];
@endphp
<section id="wsus__weekly_best" class="home2_wsus__weekly_best_2 ">
    <div class="container">
        <div class="row">
            @foreach ($categoryProductSliderSectionThree as $sliderSectionThree)
                @php
                    $lastKey = [];

                    foreach ($sliderSectionThree as $key => $category) {
                        if ($category === null) {
                            break;
                        }
                        $lastKey = [$key => $category];
                    }

                    $keyName = array_keys($lastKey)[0] ?? null;
                    $category = null;

                    if ($keyName === 'category') {
                        $category = \App\Models\Category::find($lastKey['category']);
                        $products = \App\Models\Product::withAvg('reviews', 'rating')
                            ->withCount('reviews')
                            ->where('category_id', $category->id)
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get();
                    } elseif ($keyName === 'sub_category') {
                        $category = \App\Models\SubCategory::find($lastKey['sub_category']);
                        $products = \App\Models\Product::withAvg('reviews', 'rating')
                            ->withCount('reviews')
                            ->where('sub_category_id', $category->id)
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get();
                    } else {
                        $category = \App\Models\ChildCategory::find($lastKey['child_category']);
                        $products = \App\Models\Product::withAvg('reviews', 'rating')
                            ->withCount('reviews')
                            ->where('child_category_id', $category->id)
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get();
                    }
                @endphp
                <div class="col-md-6">
                    <div class="wsus__section_header">
                        <h3>{{ $category->name }}</h3>
                    </div>
                    <div class="row weekly_best2">
                        @foreach ($products as $item)
                            <div class="col-xl-4 col-lg-4 category-{{ $key }}">
                                <a class="wsus__hot_deals__single" href="{{ route('product-detail', $item->slug) }}">
                                    <div class="wsus__hot_deals__single_img">
                                        <img src="{{ asset($item->thumb_image) }}" alt="bag"
                                            class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__hot_deals__single_text">
                                        <h5>{!! limitText($item->name) !!}</h5>
                                        <p class="wsus__rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $item->reviews_avg_rating)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor

                                            <span>({{ $item->reviews_count }} Đánh giá sản phẩm)</span>


                                    </p>
                                    @if (checkDiscount($item))
                                        <p class="wsus__tk">{{ number_format($item->offer_price, 0, ',', '.') }}{{ $settings->currency_icon }}
                                            <del>{{ number_format($item->price, 0, ',', '.') }}{{ $settings->currency_icon }}</del></p>
                                    @else
                                        <p class="wsus__tk">{{ number_format($item->price, 0, ',', '.') }}{{ $settings->currency_icon }}</p>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
