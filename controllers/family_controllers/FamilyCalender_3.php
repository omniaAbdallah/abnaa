<?php
class FamilyCalender extends MY_Controller{

    public function __construct(){
        parent::__construct();
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->model('familys_models/for_dash/Counting');
        $this->count_basic_in = $this->Counting->get_basic_in_num();
        $this->files_basic_in = $this->Counting->get_files_basic_in();
        $this->load->model('familys_models/FamilyCalender/FamilyCalender_model');
    }

    public function Calender($mother_national_num){  //family_controllers/FamilyCalender/Calender/
        $data['title']='سجل الزيارات';
        $data['footer_calender']='admin/familys_views/family_calender/script_calender';
        $data['purpose'] = $this->FamilyCalender_model->getFamilySetting(52);
        $data['types'] = $this->FamilyCalender_model->getFamilySetting(54);
        $data['emps'] = $this->FamilyCalender_model->getEmps(array('id!='=>0));
        $data['selectedEmp'] = $this->FamilyCalender_model->getBasic($mother_national_num);
        $data['records'] = $this->FamilyCalender_model->getVisits($mother_national_num);
        $data['subview'] = 'admin/familys_views/family_calender/add_family_calender';
        $this->load->view('admin_index', $data);
    }

    public function researcherCalender($mother_national_num){  //family_controllers/FamilyCalender/researcherCalender/
        $data['title']='سجل الزيارات';
        $data['footer_calender']='admin/familys_views/family_calender/script_calender2';
        $data['purpose'] = $this->FamilyCalender_model->getFamilySetting(52);
        $data['types'] = $this->FamilyCalender_model->getFamilySetting(54);
        $data['emps'] = $this->FamilyCalender_model->getEmps(array('id!='=>0));
        $data['selectedEmp'] = $this->FamilyCalender_model->getBasic($mother_national_num);
        $data['records'] = $this->FamilyCalender_model->getVisits($mother_national_num);
        $data['subview'] = 'admin/familys_views/family_calender/add_family_calender';
        $this->load->view('admin_index', $data);
    }

    public function get_events($where=false)
    {
        if(is_numeric($where)) {
            $where = array('family_visitors.id!='=>0,'family_visitors.mother_national_num_fk'=>$where);
            $where2 = array('mother_national_num_fk'=>$where);
        }
        $records = $this->FamilyCalender_model->get_events($where);
        if(! is_numeric($where)) {
            $where2 = array('mother_national_num_fk'=>$records[0]->mother_national_num_fk);
        }
        $data_events = array();
        $count = $this->FamilyCalender_model->getCount($where2);
        foreach($records as $record) {
            if($record->visit_from_date < strtotime(date("Y-m-d"))) {
                $className = 'label-success';
            }
            if($record->visit_from_date > strtotime(date("Y-m-d"))) {
                $className = 'label-info';
            }
            if($record->visit_from_date == strtotime(date("Y-m-d"))) {
                $className = 'label-important';
            }
            $data_events[] = array(
                "id"                => $record->id,
                "title"             => $record->title_setting,
                "end"               => date("Y-m-d",$record->visit_to_date).'T'.$record->end_time,
                "start"             => date("Y-m-d",$record->visit_from_date).'T'.$record->start_time,
                "date_ar"           => $record->visit_from_date_ar,
                "className"         => $className,
                "notes"             => $record->manager_notes,
                "researcher_id_fk"  => $record->researcher_id_fk,
                "visit_search_type" => $record->visit_search_type,
                "visit_purpose_fk"  => $record->visit_purpose_fk,
                "order_num"         => $record->order_num,
                "father_name"       => $record->father_name,
                "file_num"          => $record->file_num,
                "visit_status"      => $record->visit_status,
                "end_time"          => $record->end_time,
                "start_time"        => $record->start_time,
                'count'             => $count
            );
        }
        echo json_encode(array("events" => $data_events));
    }

    public function add_events()
    {
        $id = $this->FamilyCalender_model->insertEvent();
        $this->get_events(array('family_visitors.id'=>$id));
    }

    public function update_events()
    {
        $this->FamilyCalender_model->update_event();
        $this->get_events(array('family_visitors.id'=>$this->input->post('id')));
    }

    public function delete_events()
    {
        $this->FamilyCalender_model->delete_event();
    }

    public function updateTitle()
    {
        $this->FamilyCalender_model->updateTitle();
    }

    public function updateResearcher()
    {
        $this->FamilyCalender_model->updateResearcher();
        $this->get_events(array('family_visitors.id'=>$this->input->post('id')));
    }

}
?>