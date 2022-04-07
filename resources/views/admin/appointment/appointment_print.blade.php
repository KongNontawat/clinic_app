@extends('admin.layouts.print')

@section('content')
<!-- Modal View-->


<div class="container" style="font-family: Arial, Helvetica, sans-serif;">
  <div class="head-top d-flex flex-nowrap">
    <div class="logo me-4 mt-2">
      <img src="{{asset('image/LogoBeautyCare.png')}}" alt="" width="180">
    </div>
    <div class="clinic-info mt-2 w-100 border-bottom">
      <h5>คลินิคเสริมความงาม บิวตี้แคร์ </h5>
      <h6>Beauty Care Clinic</h6>
      <p>โครงการตลาดจอมพล Overflow เลขที่ 555/49 ถนนกสิกรทุ่งสร้าง ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000 โทร 064-487-0915</p>
    </div>
  </div>

  <div class="head">
    <h4 class="text-center my-2">บัตรนัด</h4>
  </div>

  <div class="body">
    <div class="row justify-content-between">
      <div class="col-7">
        <span class="fw-bold">ชื่อ-นามสกุล : </span> <span class="show_patient_name"></span> <br>
        <span class="fw-bold">รหัส : </span> <span class="show_patient_opd"></span> <br>
        <span class="fw-bold">อายุ : </span> <span class="show_patient_age"></span> <br>
        <span class="fw-bold">เบอร์โทร : </span> <span class="show_patient_phone"></span> <br>
        <span class="fw-bold">โรคประจำตัว : </span> <span class="show_patient_congenital_disease"></span> <br>
        <span class="fw-bold">แพ้ยา : </span> <span class="show_patient_drug_allergies"></span> <br>
      </div>
      <div class="col-5">
        <span class="fw-bold">ใบนัดหมายเลข : </span> <span class="show_appointment_number"></span> <br>
        <span class="fw-bold">วันที่นัด : </span> <span class="show_appointment_date"></span> <br>
        <span class="fw-bold">เวลาที่นัด : </span> <span class="show_appointment_time"></span> <br>
        <span class="fw-bold">แพทย์ผู้นัด : </span> <span class="show_doctor_name"></span> <br>
        <span class="fw-bold">ติดต่อ : </span> <span> 064-487-0915</span> <br>
      </div>
    </div>

    <p class="mt-3 fw-bold">สาเหตุที่นัด : <span class="show_reason_for_appointment fw-light"> -</span></p>

    <p class="mt-3 fw-bold">หมายเหตุ : <span class="show_doctor_comment"> -</span></p>

    <p class="text-end mt-3">ออกใบนัดวันที่ : <span class="show_created_at"></span></p>

  </div>

  @section('script')
  <script>
    $(function() {
      let id = "{{Route::current()->parameters['id']}}";
      $('#modal_detail').modal('show');
      $.ajax({
        method: 'get',
        data: {
          id: id
        },
        url: "../../../admin/appointment/show"
      }).done(function(res) {
        let data = res[0];
        $('.show_patient_name').text(`${data.patient_title} ${data.patient_fname} ${data.patient_lname}`)
        $('.show_patient_opd').text(`${data.opd_id}`)
        var date = data.patient_birthdate;
        var age = 0;
        var dob_year = date.substring(6, 10);
        var date_now = new Date().getFullYear();
        var dob_month = date.substring(3, 5);
        var month_now = new Date().getMonth() + 1;
        if (dob_month <= month_now) {
          age = date_now - dob_year;
        } else {
          age = date_now - dob_year - 1;
        }
        $('.show_patient_age').text(`${age} ปี`)
        $('.show_patient_phone').text(`${data.patient_phone}`)

        if (data.congenital_disease != null) {
          $('.show_patient_congenital_disease').text(`${data.congenital_disease}`)
        } else {
          $('.show_patient_congenital_disease').text(`-`)
        }
        if (data.drug_allergies != null) {
          $('.show_patient_drug_allergies').text(`${data.drug_allergies}`)
        } else {
          $('.show_patient_drug_allergies').text(`-`)
        }
        let appointment_date = new Date(data.appointment_date);
        let appointment_date_th = appointment_date.toLocaleDateString('th-TH', {
          year: 'numeric',
          month: 'long',
          day: 'numeric',
        })
        $('.show_appointment_number').text(`${data.appointment_number}`)
        $('.show_appointment_date').text(`${appointment_date_th}`)
        $('.show_appointment_time').text(`${data.appointment_time} น.`)
        $('.show_doctor_name').text(`${data.doctor_title} ${data.doctor_fname} ${data.doctor_lname}`)


        $('.show_reason_for_appointment').text(`${data.reason_for_appointment}`)
        $('.show_doctor_comment').html(`${data.doctor_comment}`)

        let year = new Date(data.created_at).getFullYear();
        let month = new Date(data.created_at).getMonth();
        let day = new Date(data.created_at).getDate();

        let created_at = new Date(data.created_at);
        let date_th = created_at.toLocaleDateString('th-TH', {
          year: 'numeric',
          month: 'long',
          day: 'numeric',
        })

        $('.show_created_at').text(`${date_th}`)
        window.print();
      })
    })
    window.onafterprint = function(e) {
      window.history.back();
    }
    if (window.matchMedia) {
      var mediaQueryList = window.matchMedia('print');
      mediaQueryList.addListener(function(mql) {
        if (!mql.matches) {
          window.history.back();
        }
      });
    }
  </script>
  @endsection