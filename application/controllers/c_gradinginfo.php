<?php

class c_gradinginfo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('username') == NULL) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Silahkan login terlebih dahulu
                </div>');
            redirect('c_auth');
        }
        $this->load->model('m_simoga');
    }

    public function index()
    {
        if ($this->session->userdata('level') == 0) {
            $data['datagrading'] = $this->m_simoga->grading_info();
            $data['dt_grade'] = array('A1+', 'A', 'A1', 'A2', 'A2+', 'A3', 'PLS', 'B', 'A ALPHA', 'A+', 'PLS A', 'A1/PLASMA');
            $data['dt_grade2'] = array('SGH', 'SPA', 'SGO', 'TPU', 'TME', 'SBT', 'LDA', 'STA', 'TER', 'SIN');
            // $data['dt_grade'] = $this->m_simoga->grading_info_dropdown();
            // $data['dt_grade2'] = $this->m_simoga->grading_info_dropdown2();
        } else if ($this->session->userdata('level') == 1) {
            $data['datagrading'] = $this->m_simoga->grading_info_sgh();
            $data['dt_grade'] = array('A ALPHA', 'A+', 'PLS', 'A', 'A1', 'A2', 'PLS A', 'A1+');
            $data['dt_grade2'] = array('SGH', 'SPA', 'SGO');
        } else if ($this->session->userdata('level') == 2) {
            $data['datagrading'] = $this->m_simoga->grading_info_tpu();
            $data['dt_grade'] = array('A1+', 'A1/PLASMA', 'A2', 'A1');
            $data['dt_grade2'] = array('TPU', 'TME');
        } else if ($this->session->userdata('level') == 3) {
            $data['datagrading'] = $this->m_simoga->grading_info_sbt();
            $data['dt_grade'] = array('PLS', 'A1', 'A2', 'B');
            $data['dt_grade2'] = array('SBT', 'LDA');
        } else if ($this->session->userdata('level') == 4) {
            $data['datagrading'] = $this->m_simoga->grading_info_sta();
            $data['dt_grade'] = array('A1+', 'A', 'A1', 'A2', 'A2+', 'A3');
            $data['dt_grade2'] = array('STA', 'TER', 'SIN');
        }
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_gradinginfo', $data);
        $this->load->view('templates/footer');
    }

    public function load_filter()
    {
        $grd = $_GET['grade'];
        $kebun = $_GET['pks'];

        if ($this->session->userdata('level') == 0) {
            if ($grd != '' && $kebun != '') {
                $data['datagrading'] = $this->m_simoga->kbn_grd($grd, $kebun);
            } elseif ($grd != '') {
                $data['datagrading'] = $this->m_simoga->filter_grade($grd);
            } elseif ($kebun != '') {
                $data['datagrading'] = $this->m_simoga->filter_pks($kebun);
            } else {
                $data['datagrading'] = $this->m_simoga->grading_info();
            }
        } else if ($this->session->userdata('level') == 1) {
            $grading_rayon = array('SGH', 'SPA', 'SGO');
            if ($grd != '' && $kebun != '') {
                $data['datagrading'] = $this->m_simoga->kbn_grd_rayon($grading_rayon, $grd, $kebun);
            } elseif ($grd != '') {
                $data['datagrading'] = $this->m_simoga->filter_grade_rayon($grading_rayon, $grd);
            } elseif ($kebun != '') {
                $data['datagrading'] = $this->m_simoga->filter_pks($kebun);
            } else {
                $data['datagrading'] = $this->m_simoga->grading_info_sgh();
            }
        } else if ($this->session->userdata('level') == 2) {
            $grading_rayon = array('TPU', 'TME');
            if ($grd != '' && $kebun != '') {
                $data['datagrading'] = $this->m_simoga->kbn_grd_rayon($grading_rayon, $grd, $kebun);
            } elseif ($grd != '') {
                $data['datagrading'] = $this->m_simoga->filter_grade_rayon($grading_rayon, $grd);
            } elseif ($kebun != '') {
                $data['datagrading'] = $this->m_simoga->filter_pks($kebun);
            } else {
                $data['datagrading'] = $this->m_simoga->grading_info_tpu();
            }
        } else if ($this->session->userdata('level') == 3) {
            $grading_rayon = array('SBT', 'LDA');
            if ($grd != '' && $kebun != '') {
                $data['datagrading'] = $this->m_simoga->kbn_grd_rayon($grading_rayon, $grd, $kebun);
            } elseif ($grd != '') {
                $data['datagrading'] = $this->m_simoga->filter_grade_rayon($grading_rayon, $grd);
            } elseif ($kebun != '') {
                $data['datagrading'] = $this->m_simoga->filter_pks($kebun);
            } else {
                $data['datagrading'] = $this->m_simoga->grading_info_sbt();
            }
        } else if ($this->session->userdata('level') == 4) {
            $grading_rayon = array('STA', 'TER', 'SIN');
            if ($grd != '' && $kebun != '') {
                $data['datagrading'] = $this->m_simoga->kbn_grd_rayon($grading_rayon, $grd, $kebun);
            } elseif ($grd != '') {
                $data['datagrading'] = $this->m_simoga->filter_grade_rayon($grading_rayon, $grd);
            } elseif ($kebun != '') {
                $data['datagrading'] = $this->m_simoga->filter_pks($kebun);
            } else {
                $data['datagrading'] = $this->m_simoga->grading_info_sta();
            }
        }

        if (!empty($data['datagrading'])) {
            $no = 1;
            foreach ($data['datagrading'] as $plasma) : ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $plasma['grade']; ?></td>
                    <td><?php echo $plasma['unit']; ?></td>
                    <td><?php echo $plasma['tenera_min']; ?></td>
                    <td><?php echo $plasma['tenera_max']; ?></td>
                    <td><?php echo $plasma['dura_min']; ?></td>
                    <td><?php echo $plasma['dura_max']; ?></td>
                </tr>
            <?php endforeach;
        } else {
            ?>

            <tr>
                <td style="text-align:center" colspan='19'>Tidak ada data</td>
            </tr>
<?php
        }
    }
}
