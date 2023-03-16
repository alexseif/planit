<?php

namespace App\Controller;

use App\Entity\WorkdayTemplate;
use App\Form\WorkdayTemplateType;
use App\Repository\WorkDayTemplateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/workday/template')]
class WorkdayTemplateController extends AbstractController
{

    #[Route('/', name: 'app_workday_template_index', methods: ['GET'])]
    public function index(WorkDayTemplateRepository $workDayTemplateRepository
    ): Response {
        return $this->render('workday_template/index.html.twig', [
          'workday_templates' => $workDayTemplateRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_workday_template_new', methods: ['GET', 'POST'])]
    public function new(
      Request $request,
      WorkDayTemplateRepository $workDayTemplateRepository
    ): Response {
        $workdayTemplate = new WorkdayTemplate();
        $form = $this->createForm(WorkdayTemplateType::class, $workdayTemplate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $workDayTemplateRepository->save($workdayTemplate, true);

            return $this->redirectToRoute(
              'app_workday_template_index',
              [],
              Response::HTTP_SEE_OTHER
            );
        }

        return $this->renderForm('workday_template/new.html.twig', [
          'workday_template' => $workdayTemplate,
          'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_workday_template_show', methods: ['GET'])]
    public function show(WorkdayTemplate $workdayTemplate): Response
    {
        return $this->render('workday_template/show.html.twig', [
          'workday_template' => $workdayTemplate,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_workday_template_edit', methods: [
      'GET',
      'POST',
    ])]
    public function edit(
      Request $request,
      WorkdayTemplate $workdayTemplate,
      WorkDayTemplateRepository $workDayTemplateRepository
    ): Response {
        $form = $this->createForm(WorkdayTemplateType::class, $workdayTemplate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $workDayTemplateRepository->save($workdayTemplate, true);

            return $this->redirectToRoute(
              'app_workday_template_index',
              [],
              Response::HTTP_SEE_OTHER
            );
        }

        return $this->renderForm('workday_template/edit.html.twig', [
          'workday_template' => $workdayTemplate,
          'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_workday_template_delete', methods: ['POST'])]
    public function delete(
      Request $request,
      WorkdayTemplate $workdayTemplate,
      WorkDayTemplateRepository $workDayTemplateRepository
    ): Response {
        if ($this->isCsrfTokenValid(
          'delete' . $workdayTemplate->getId(),
          $request->request->get('_token')
        )) {
            $workDayTemplateRepository->remove($workdayTemplate, true);
        }

        return $this->redirectToRoute(
          'app_workday_template_index',
          [],
          Response::HTTP_SEE_OTHER
        );
    }

}
