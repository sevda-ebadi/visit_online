@extends('admin_admin.layout.template')


@section('body')
    <div class="az-content">
        <div class="container">
            <div style="text-align: right" class="az-content-body">

                <div style="text-align: right   ">

                    <h2 class="az-content-title"> ویزیت ها   @if(isset($description))   ( {{ $description }} ) @endif  </h2>
                </div>

                @include('admin_admin.messages')


                <table id="datatable2" class="display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">عملیات ها</th>
                        <th class="wd-15p">ساعت</th>
                        <th class="wd-20p">تاریخ</th>
                        <th class="wd-20p">وضعیت</th>
                        <th class="wd-10p">بیمار</th>
                        <th class="wd-25p">پزشک</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($visits as $visit)
                            <tr>

                                <td>


                                    <button @if(count($visit->medicines()->get()) == 0) disabled  @endif onclick="window.location='{{ route('visit_medicines', ['visit_id'=>$visit->id]) }}'" class="btn btn-primary btn-rounded">دارو ها</button>

                                    @if($visit->status != 2)
                                        <button onclick="window.location='{{ route('change_visit_status', ['visit'=>$visit]) }}'" class="btn btn-danger btn-rounded">لغو</button>
                                    @endif
                                </td>
                                <td>{{ $visit->time }}</td>
                                <td>{{ $visit->date }}</td>
                                <td>{{ checkVisitStatus($visit->status) }}</td>

                                <td>
                                    {{ $visit->patient()->first()->user()->first()->name.' '.$visit->patient()->first()->user()->first()->family }}
                                </td>
                                <td>
                                    {{ $visit->doctor()->first()->user()->first()->name.' '.$visit->doctor()->first()->user()->first()->family }}
                                </td>
                            </tr>
                            @empty
                                <div class="alert alert-primary">
                                    هیچ ویزیت ای ثبت نشده است.
                                </div>
                        @endforelse
                    </tbody>
                </table>

                <div class="mg-lg-b-30"></div>

            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection