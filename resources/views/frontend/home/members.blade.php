@extends('frontend.index_master')
@section('frontend')

<section class="section other-page-sec">
    <div class="container">
        <div class="page-title">
            <div class="short-line"></div>

            <h2>Members
                <div class="breadcrumb">
                    <a href="/"><span>Home</span></a>
                    <span>/</span>
                    <span class="active">Members</span>

                </div>
            </h2>
            <!-- <p>Click to Visit our events</p> -->
        </div>


        <div class="memberGrid">
            @foreach ($members as $member)
            <div class="memberBoxCon">
                <div class="memberBox">
                    <img src="{{ Storage::url($member?->member_image) }}" alt="">
                    <h6>{{ $member->member_name }}</h6>
                    <p>{{ $member->member_designation }}</p>
                    <p>{{ $member->member_phone_no }}</td>
                    <p>{{ $member->member_email }}</p>
                </div>

            </div>
            @endforeach

           
        </div>
    </div>
</section>
@endsection
