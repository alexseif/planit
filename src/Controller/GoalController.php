<?php

namespace App\Controller;

use App\Entity\Goal;
use App\Form\GoalType;
use App\Repository\GoalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/goal")
 */
class GoalController extends AbstractController
{

    /**
     * @Route("/", name="app_goal_index", methods={"GET"})
     */
    public function index(GoalRepository $goalRepository): Response
    {
        return $this->render('goal/index.html.twig', [
          'goals' => [
            'personal' => $goalRepository->findBy(['professional' => false]),
            'professional' => $goalRepository->findBy(['professional' => true]),
          ],
        ]);
    }

    /**
     * @Route("/new", name="app_goal_new", methods={"GET", "POST"})
     */
    public function new(
      Request $request,
      GoalRepository $goalRepository
    ): Response {
        $goal = new Goal();
        $form = $this->createForm(GoalType::class, $goal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $goalRepository->add($goal, true);

            return $this->redirectToRoute(
              'app_goal_index',
              [],
              Response::HTTP_SEE_OTHER
            );
        }

        return $this->renderForm('goal/new.html.twig', [
          'goal' => $goal,
          'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_goal_show", methods={"GET"})
     */
    public function show(Goal $goal): Response
    {
        return $this->render('goal/show.html.twig', [
          'goal' => $goal,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_goal_edit", methods={"GET", "POST"})
     */
    public function edit(
      Request $request,
      Goal $goal,
      GoalRepository $goalRepository
    ): Response {
        $form = $this->createForm(GoalType::class, $goal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $goalRepository->add($goal, true);

            return $this->redirectToRoute(
              'app_goal_index',
              [],
              Response::HTTP_SEE_OTHER
            );
        }

        return $this->renderForm('goal/edit.html.twig', [
          'goal' => $goal,
          'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_goal_delete", methods={"POST"})
     */
    public function delete(
      Request $request,
      Goal $goal,
      GoalRepository $goalRepository
    ): Response {
        if ($this->isCsrfTokenValid(
          'delete' . $goal->getId(),
          $request->request->get('_token')
        )) {
            $goalRepository->remove($goal, true);
        }

        return $this->redirectToRoute(
          'app_goal_index',
          [],
          Response::HTTP_SEE_OTHER
        );
    }

}
