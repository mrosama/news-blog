<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class Post extends MX_Controller  {        const VIEWPATH='../../post/views/post/';    private $api;          public function __construct() {          parent::__construct();       $this->api = $this -> load -> library('apiservices');        $this->api->setThemes('app/app');    $this->api->setThemes('post');    $this->api->setClang('article');   $this->load->model('articles_model');   }                 public function index(){      $api = $this -> load -> library('apiservices');         $api->start_Cache();    $data=array();               if ($this->uri->segment(3) !== FALSE){           $param= (string) $this->uri->segment(3);           $rs=$this->articles_model->getPostBySlug( $param ); 		                       if( $rs=='Error'){              show_404();            }                                $data['recordset']= $rs;       } else {                      show_404();       }            //update view        $this->articles_model->updateVisitor($rs['ID']);       //               if($this->input->post("IsPost")=="addComment"){                 $data['comment_result']=$this->articles_model->addComments();              }               $data['comments']=$this->articles_model->getComments($rs['ID']);     $data['number_comments'] = $this->articles_model->getnumCommt($rs['ID']);            $this->template->TPL(Post::VIEWPATH.'index', $data);    }               public function category(){        $api = $this -> load -> library('apiservices');         $api->start_Cache();    $data=array();                     //get cat     if ($this->uri->segment(3) === FALSE){         $cat=0;     } else {        $cat= intval($this->security->xss_clean($this->uri->segment(3)));     }     $data['cat']=$this->articles_model->getCat( $cat );                $this->template->TPL(Post::VIEWPATH.'category', $data);   }                ///       public function pages(){      $data=array();                  if ($this->uri->segment(3) === FALSE){         $cat=0;     } else {        $cat= intval($this->security->xss_clean($this->uri->segment(3)));     }           $result_row=$this->articles_model->getAllPost( $cat );                $data['Rows_data']=$result_row['Rows_data'];       $data['Total_data']=$result_row['Total_data'];       $data['Paging_data']=$result_row['Paging_data'];             $this->template->TPL(Post::VIEWPATH.'pages', $data);      }                         public function adspost(){     $api = $this -> load -> library('apiservices');         $api->start_Cache();     $data=array();          $data['ads_news']=$this->articles_model->ads_post();            $this->load->view(Post::VIEWPATH.'adspost', $data);         }               public function printdoc(){     $data=array();            if ($this->uri->segment(3) !== FALSE){           $param= (int) $this->uri->segment(3);          $data['recordset']=$this->articles_model->getPost( $param );        } else {                      show_404();       }     $this->load->view(Post::VIEWPATH.'printdoc', $data);     }     ////////////////////////////public function printpdf(){    $data=array();            if ($this->uri->segment(3) !== FALSE){           $param= (int) $this->uri->segment(3);          $data['recordset']=$this->articles_model->getPost( $param );        } else {                      show_404();       }    $this->load->view(Post::VIEWPATH.'printpdf', $data);  }                              public function slidepost(){     $api = $this -> load -> library('apiservices');         $api->start_Cache();     $data=array();          $rs=$this->articles_model->slide_post();     $data['slide']=$rs;       $this->load->view(Post::VIEWPATH.'slide', $data);         }       ///////////////////////////////  public function last_post(){    // $api = $this -> load -> library('apiservices');     //    $api->start_Cache();      $data=array();          $data['rs']=$this->articles_model->ads_post();            $this->load->view(Post::VIEWPATH.'last', $data);   }   ///   public function page($id){     $api = $this -> load -> library('apiservices');         $api->start_Cache();     $data=array();          $rs=$this->articles_model->getPage($id);     if(is_array($rs) && count($rs) != 0){     $data['recordset']=$rs;              } else {          show_404();              }      $this->load->view(Post::VIEWPATH.'page', $data); }                                ///public function search(){    $api = $this -> load -> library('apiservices');         $api->start_Cache();     $data=array();              if ($this->uri->segment(3) !== FALSE){          $param=  $this->security->xss_clean($this->uri->segment(3));             $result_row=$this->articles_model-> SearchPost($param);                  $data['Rows_data']=$result_row['Rows_data'];       $data['Total_data']=$result_row['Total_data'];       $data['Paging_data']=$result_row['Paging_data'];      }          if($this->input->get('searchinput')){         $param= $this->input->get('searchinput',true);                   $result_row=$this->articles_model-> SearchPost($param);                  $data['Rows_data']=$result_row['Rows_data'];       $data['Total_data']=$result_row['Total_data'];       $data['Paging_data']=$result_row['Paging_data'];                       }          $data['serach_for']=$param;       $this->template->TPL(Post::VIEWPATH.'search', $data);         }              public function tags(){      $api = $this -> load -> library('apiservices');         $api->start_Cache();      $Tag=$this->articles_model-> tag_cloud();      $data['mytag']=$Tag;       $this->load->view(Post::VIEWPATH.'tags', $data);  }           public function tag(){        $api = $this -> load -> library('apiservices');         $api->start_Cache();          if ($this->uri->segment(3) !== FALSE){          $param=  $this->security->xss_clean($this->uri->segment(3));               $result_row=$this->articles_model-> Searchbytags($param);          $data['Rows_data']=$result_row['Rows_data'];       $data['Total_data']=$result_row['Total_data'];       $data['Paging_data']=$result_row['Paging_data'];                    }                              $this->template->TPL(Post::VIEWPATH.'tag', $data);             }                                    }