@push('js')
<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
@endpush

@push('style')
<style>
.dropzone {
  min-height: 350px;
  border: 2px dashed #967ADC;
  background: #F3F3F3; 
}
.dropzone .dz-message {
  font-size: 2rem;
  position: absolute;
  top: 50%;
  left: 0;
  width: 100%;
  height: 300px;
  margin-top: -30px;
  color: #967ADC;
  text-align: center; 
}
.dropzone .dz-message:before {
  content: "\e94b";
  font-family: 'feather';
  font-size: 80px;
  position: absolute;
  top: 48px;
  width: 80px;
  height: 80px;
  display: inline-block;
  left: 50%;
  margin-left: -40px;
  line-height: 1;
  z-index: 2;
  color: #967ADC;
  text-indent: 0px;
  font-weight: normal;
  -webkit-font-smoothing: antialiased; 
}
.dropzone .dz-preview.dz-image-preview {
  background: transparent; 
}
.dropzone .dz-preview .dz-remove {
  font-size: 1.1rem;
  color: #DA4453;
  line-height: 2rem; 
}
.dropzone .dz-preview .dz-remove:before {
  content: "\e9e6";
  font-family: 'feather';
  display: inline-block;
  line-height: 1;
  z-index: 2;
  text-indent: 0px;
  font-weight: normal;
  -webkit-font-smoothing: antialiased; 
}
.dropzone .dz-preview .dz-remove:hover {
  text-decoration: none;
  color: #c42737; 
}
</style>
@endpush