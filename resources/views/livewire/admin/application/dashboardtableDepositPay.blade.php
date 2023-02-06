<div class="notification_action">
    <x-admin.table>
        <x-slot name="search">
            <x-slot name="thead">
                <tr role="row">
                    <th class="text-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;" aria-sort="ascending" aria-label="Agent: activate to sort column descending">S.no
                    </th>

                    <th class="text-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;" aria-sort="ascending" aria-label="Agent: activate to sort column descending">Student Name
                    </th>
                    <th class="text-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;" aria-sort="ascending" aria-label="Agent: activate to sort column descending">Student Email
                    </th>
                    <th class="text-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;" aria-sort="ascending" aria-label="Agent: activate to sort column descending">Student DOB
                    </th>
                    <th class="text-center" class="align-center" rowspan="1" colspan="1" style="min-width:200px" aria-label="Actions">Actions</th>

                </tr>

                <tr>
                    <th class="text-center">
                        <input type="text" id="searchFirstName">

                    </th>
                    <th class="text-center">
                        <input type="text" id="searchLastName">

                    </th>
                    <th class="text-center">
                        <input type="text" id="searchEmail">


                    </th>
                    <th class="text-center">
                        <input type="text" id="searchPhone">

                    </th>


                    <th>
                        <div class="row text-center">
                            <div class="col-md-6"><a class="btn btn-primery text-light" id="serachData">Search</a></div>
                            <div class="col-md-6"><a class="btn btn-primery text-light" id="resetData">Reset</a></div>
                        </div>


                    </th>
                </tr>
            </x-slot>


            @php
            $lastId = null;
            $rowClass = 'grey';
            $getApplication = App\Models\Payment::get();

            @endphp
            <?php $count = 1 ?>
            <x-slot name="tbody">

                @forelse($getApplication as $key => $student)




                <tr role="row" class="odd {{ $rowClass }}">

                    <td class="col-md-2">{{$key+ $count}}</td>

                    <td class="col-md-8">{{ ucfirst($student['student_name']) ?? '---' }}</td>
                    <td class="col-md-8">{{ ucfirst($student['student_email']) ?? '---' }}</td>
                    <td class="col-md-8">{{ ucfirst($student['student_dob']) ?? '---' }}</td>
                    <td></td>
                </tr>


                @empty

                <tr>>
                    <td colspan="6" class="align-center">No records available</td>
                </tr>
                <?php $count++ ?>

                @endforelse
            </x-slot>

    </x-admin.table>