<?php

class PaperController extends BaseController
{
    public function getAll()
    {
        $papers = DB::table('papers')->paginate(10);
        return View::make('paper.list')->with(array('papers' => $papers));
    }

    public function getAdd()
    {
        return View::make('paper.new');
    }

    public function postStore()
    {
        $type = $_POST['type'];
        switch($type){
            case 'xz':
                $paper = new Paper;
                $paper->title=$_POST['title'];
                $paper->content=$_POST['content'];
                $paper->answer=$_POST['answer'];
                $paper->type=$type;
                $paper->save();
                break;
            case 'tk':
                $paper = new Paper;
                $paper->title=$_POST['title'];
                $paper->content=$_POST['content'];
                $paper->answer=$_POST['answer'];
                $paper->type=$type;
                $paper->save();
                break;
            case 'pd':
                $paper = new Paper;
                $paper->title=$_POST['title'];
                $paper->content='';
                $paper->answer=$_POST['answer'];
                $paper->type=$type;
                $paper->save();
                break;
            case 'jd':
                $paper = new Paper;
                $paper->title=$_POST['title'];
                $paper->content='';
                $paper->answer=$_POST['answer'];
                $paper->type=$type;
                $paper->save();
                break;
        }
        return Redirect::action('PaperController@getAll');

    }

    public function getIndex()
    {
        return View::make('paper.one');
    }

    public function postSubject()
    {

        $num_xz = $_POST['number']['xz'];
        $num_tk = $_POST['number']['tk'];
        $num_pd = $_POST['number']['pd'];
        $num_jd = $_POST['number']['jd'];
//
//        $xz = $_POST['xz'];
//        $tk = $_POST['tk'];
//        $pd = $_POST['pd'];
//        $jd = $_POST['jd'];
        $results_xz = DB::select('SELECT *FROM `nl_papers` AS t1
                    JOIN (SELECT ROUND(RAND() * (SELECT MAX(id) FROM `nl_papers`)) AS id) AS t2
                    WHERE( t1.id >= t2.id AND type="xz")
                    ORDER BY t1.id ASC LIMIT ?', array($num_xz));

        $results_tk = DB::select('SELECT *FROM `nl_papers_tk` AS t1
                    JOIN (SELECT ROUND(RAND() * (SELECT MAX(id) FROM `nl_papers_tk`)) AS id) AS t2
                    WHERE( t1.id >= t2.id AND type="tk")
                    ORDER BY t1.id ASC LIMIT ?', array($num_tk));

        $results_pd = DB::select('SELECT *FROM `nl_papers` AS t1
                    JOIN (SELECT ROUND(RAND() * (SELECT MAX(id) FROM `nl_papers`)) AS id) AS t2
                    WHERE( t1.id >= t2.id AND type="pd")
                    ORDER BY t1.id ASC LIMIT ?', array($num_pd));

        $results_jd = DB::select('SELECT *FROM `nl_papers_jd` AS t1
                    JOIN (SELECT ROUND(RAND() * (SELECT MAX(id) FROM `nl_papers_jd`)) AS id) AS t2
                    WHERE( t1.id >= t2.id AND type="jd")
                    ORDER BY t1.id ASC LIMIT ?', array($num_jd));

        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('数字逻辑');
        $pdf->SetTitle('数字逻辑试题');

        $pdf->SetKeywords('数字逻辑');
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);

        $pdf->SetFont('droidsansfallback', '', 12);
// set color for text
        $pdf->SetTextColor(0, 63, 127);
//        $pdf->Text(20,40,dd($results_xz));
        $i = 2;
        if ($results_xz != null) {
            $pdf->AddPage();
            $pdf->Text(20, 10, "---^_^----选择题----^_^---");
            foreach ($results_xz as $t_xz) {
                $pdf->Text(20, $i * 10, $t_xz->title);
                $pdf->Text(20, ($i + 1) * 10, $t_xz->content);
                $i = $i + 2;
            }
        }
        if ($results_pd != null) {
            $p = 2;
            $pdf->AddPage();
            $pdf->Text(20, 10, "---^_^----判断题----^_^---");
            foreach ($results_pd as $t_pd) {
                $pdf->Text(20, $p * 10, $t_pd->title);
                $pdf->Text(20, ($p + 1) * 10, $t_pd->content);
                $p = $p + 2;
            }
        }
        if ($results_tk != null) {
            $t = 2;
            $pdf->AddPage();
            $pdf->Text(20, 10, "---^_^----填空题----^_^---");
            foreach ($results_tk as $t_tk) {
                $pdf->Text(20, $t * 10, $t_tk->title);
                $pdf->Text(20, ($t + 1) * 10, $t_tk->content);
                $t = $t + 2;
            }
        }
        if ($results_jd != null) {
            $j = 2;
            $pdf->AddPage();
            $pdf->Text(20, 10, "---^_^----简答题----^_^---");
            foreach ($results_jd as $t_jd) {
                $pdf->Text(20, $j * 10, $t_jd->title);
                $pdf->Text(20, ($j + 2) * 10, $t_jd->content);
                $j = $j + 4;
            }
        }
        $filename = storage_path() . '/paper.pdf';
        $pdf->output($filename, 'F');

//        return View::make('paper.test', array('num' => $num_tk, 'r_xz' => $results_xz, 'r_tk' => $results_tk,'r_jd' => $results_jd));
//        return View::make('paper.test', array('num' => $num_xz));
        return Response::download($filename);
    }


    public function makePDF()
    {

    }
}