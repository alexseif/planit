<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{

    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig', []);
    }

    /**
     * @Route("/workday_template", name="app_workday_template")
     */
    public function workdayTemplate(): Response
    {
        /**
         * 6:00am  Wake up, morning routine
         * 7:00am  Exercise or workout
         * 8:00am  Breakfast, shower, dress
         * 9:00am  Work session 1
         * 10:30am  Break and snack
         * 11:00am  Work session 2
         * 12:30pm  Lunch and break
         * 1:30pm  Work session 3
         * 3:00pm  Break and snack
         * 3:30pm  Work session 4
         * 5:00pm  End of workday, wind down
         * 6:00pm  Dinner and relaxation
         * 8:00pm  Personal time or hobby
         * 9:00pm  Wind down, prepare for bed
         * 10:00pm  Bedtime
         */
        $workdayTemplate = [
          "6:00am" => "Wake up, morning routine",
          "7:00am" => "Exercise or workout",
          "8:00am" => "Breakfast, shower, dress",
          "9:00am" => "Work session 1",
          "10:30am" => "Break and snack",
          "11:00am" => "Work session 2",
          "12:30pm" => "Lunch and break",
          "1:30pm" => "Work session 3",
          "3:00pm" => "Break and snack",
          "3:30pm" => "Work session 4",
          "5:00pm" => "End of workday, wind down",
          "6:00pm" => "Dinner and relaxation",
          "8:00pm" => "Personal time or hobby",
          "9:00pm" => "Wind down, prepare for bed",
          "10:00pm" => "Bedtime",
        ];
        return $this->render('default/workday_template.html.twig', [
          'workday_template' => $workdayTemplate,
        ]);
    }

    /**
     * @Route("/workweek_template", name="app_workweek_template")
     */
    public function workweekTemplate(): Response
    {
        /**
         * | Time | Sunday | Monday | Tuesday | Wednesday | Thursday |
         * | --- | --- | --- | --- | --- | --- |
         * | 6am | Wake up | Wake up | Wake up | Wake up | Wake up |
         * | 6:30am | Exercise | Exercise | Exercise | Exercise | Exercise |
         * | 7am | Breakfast | Breakfast | Breakfast | Breakfast | Breakfast |
         * | 7:30am | Commute to work | Commute to work | Commute to work | Commute to work | Commute to work |
         * | 8am | Work | Work | Work | Work | Work |
         * | 10am | Break | Break | Break | Break | Break |
         * | 10:30am | Work | Work | Work | Work | Work |
         * | 12:30pm | Lunch | Lunch | Lunch | Lunch | Lunch |
         * | 1:30pm | Work | Work | Work | Work | Work |
         * | 3:30pm | Break | Break | Break | Break | Break |
         * | 4pm | Work | Work | Work | Work | Work |
         * | 6pm | Commute back home | Commute back home | Commute back home | Commute back home | Commute back home |
         * | 6:30pm | Relax/leisure time | Relax/leisure time | Relax/leisure time | Relax/leisure time | Relax/leisure time |
         * | 7pm | Dinner | Dinner | Dinner | Dinner | Dinner |
         * | 8pm | Study/Practice music | Study/Practice music | Study/Practice music | Study/Practice music | Study/Practice music |
         * | 10pm | Wind down/relax | Wind down/relax | Wind down/relax | Wind down/relax | Wind down/relax |
         * | 11pm | Sleep | Sleep | Sleep | Sleep | Sleep |
         */
        $workweek = [
          'Sunday',
          'Monday',
          'Tuesday',
          'Wednesday',
          'Thursday',
        ];
        $workweekTemplate = [
          "6:00" => ["Wake up", "Wake up", "Wake up", "Wake up", "Wake up"],
          "6:30" => [
            "Exercise",
            "Exercise",
            "Exercise",
            "Exercise",
            "Exercise",
          ],
          "7:00" => [
            "Breakfast",
            "Breakfast",
            "Breakfast",
            "Breakfast",
            "Breakfast",
          ],
          "7:30" => [
            "Commute to work",
            "Commute to work",
            "Commute to work",
            "Commute to work",
            "Commute to work",
          ],
          "8:00" => ["Work", "Work", "Work", "Work", "Work"],
          "10:00" => ["Break", "Break", "Break", "Break", "Break"],
          "10:30" => ["Work", "Work", "Work", "Work", "Work"],
          "12:30" => ["Lunch", "Lunch", "Lunch", "Lunch", "Lunch"],
          "13:30" => ["Work", "Work", "Work", "Work", "Work"],
          "15:30" => ["Break", "Break", "Break", "Break", "Break"],
          "16:00" => ["Work", "Work", "Work", "Work", "Work"],
          "18:00" => [
            "Commute back home",
            "Commute back home",
            "Commute back home",
            "Commute back home",
            "Commute back home",
          ],
          "18:30" => [
            "Relax/leisure time",
            "Relax/leisure time",
            "Relax/leisure time",
            "Relax/leisure time",
            "Relax/leisure time",
          ],
          "19:00" => ["Dinner", "Dinner", "Dinner", "Dinner", "Dinner"],
          "20:00" => [
            "Study/Practice music",
            "Study/Practice music",
            "Study/Practice music",
            "Study/Practice music",
            "Study/Practice music",
          ],
          "22:00" => [
            "Wind down/relax",
            "Wind down/relax",
            "Wind down/relax",
            "Wind down/relax",
            "Wind down/relax",
          ],
          "23:00" => ["Sleep", "Sleep", "Sleep", "Sleep", "Sleep"],
        ];
        return $this->render('default/workweek_template.html.twig', [
          'workweek' => $workweek,
          'workweek_template' => $workweekTemplate,
        ]);
    }

}
