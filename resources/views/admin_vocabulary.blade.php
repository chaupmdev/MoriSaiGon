@extends('admin_layout')
@section('content')
<div class="container-fluid" id="ctlVocabulary">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Từ Vựng</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#staticBackdrop"><i
                class="fas fa-plus fa-sm text-white"></i> Thêm mới</a>
    </div>

    <!-- Content Row -->
    <div class="row pl-3 pr-3">
        <div class="form-group">
            <select class="form-control" id="exampleFormControlSelect1">
              <option>1</option>
            </select>
        </div>
    </div>

    <div class="row pl-3 pr-3">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Japanese</th>
                <th scope="col">Vietnamese</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
    </div>
    <!-- Content Row -->

    {{-- Modal form --}}
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Thêm từ vựng mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Bài <span class="text-danger">*</span></label>
                                <select name="" id="" class="form-control" v-model="formData.course">
                                    @for ($i = 1; $i <= 29; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div :class="formError['japanese'] != undefined ? 'form-group error-form' : 'form-group'">
                                <label for="">Từ vựng <span class="text-danger">*</span></label>
                                <input type="text" name="" id="" :class="formError['japanese'] != undefined ? 'form-control is-invalid' : 'form-control'" placeholder="Japanese..." v-model="formData.japanese">
                                <p v-if="formError['japanese'] != undefined" class="pl-1 pt-1 text-danger small" v-html="formError['japanese'].join('<br />')"></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div :class="formError['vietnamese'] != undefined ? 'form-group error-form' : 'form-group'">
                                <input type="text" name="" id="" :class="formError['vietnamese'] != undefined ? 'form-control is-invalid' : 'form-control'" placeholder="Vietnamese..." v-model="formData.vietnamese">
                                <p v-if="formError['vietnamese'] != undefined" class="pl-1 pt-1 text-danger small" v-html="formError['vietnamese'].join('<br />')"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div :class="formError['wr_answer1'] != undefined ? 'form-group error-form' : 'form-group'">
                                <label for="">Đáp án nhiễu <span class="text-danger">*</span></label>
                                <input type="text" name="" id="" :class="formError['wr_answer1'] != undefined ? 'form-control is-invalid' : 'form-control'" placeholder="Đáp án nhiễu 1..." v-model="formData.wr_answer1">
                                <p v-if="formError['wr_answer1'] != undefined" class="pl-1 pt-1 text-danger small" v-html="formError['wr_answer1'].join('<br />')"></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div :class="formError['wr_answer2'] != undefined ? 'form-group error-form' : 'form-group'">
                                <input type="text" name="" id="" :class="formError['wr_answer2'] != undefined ? 'form-control is-invalid' : 'form-control'" placeholder="Đáp án nhiễu 2..." v-model="formData.wr_answer2">
                                <p v-if="formError['wr_answer2'] != undefined" class="pl-1 pt-1 text-danger small" v-html="formError['wr_answer2'].join('<br />')"></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div :class="formError['wr_answer3'] != undefined ? 'form-group error-form' : 'form-group'">
                                <input type="text" name="" id="" :class="formError['wr_answer3'] != undefined ? 'form-control is-invalid' : 'form-control'" placeholder="Đáp án nhiễu 3..." v-model="formData.wr_answer3">
                                <p v-if="formError['wr_answer3'] != undefined" class="pl-1 pt-1 text-danger small" v-html="formError['wr_answer3'].join('<br />')"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <div class="d-flex justify-content-center mb-4">
                                <img id="selectedAvatar"
                                    :src="formData.image"
                                class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;"/>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="btn btn-outline-info btn-rounded">
                                    <label class="form-label m-1" for="customFile2">Chọn ảnh</label>
                                    <input type="file"
                                        class="form-control d-none"
                                        id="customFile2"
                                        accept="image/png, image/jpeg"
                                        @change="previewFiles" multiple
                                        ref="inputFile" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" @click="storeVocabulary">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal form --}}
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ mix('/js/modules/vocabulary.js') }}"  charset="utf-8"></script>
@endsection
