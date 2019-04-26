<?php
/*
  ./src/Controller/WorkController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Work;
use App\Form\WorkType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class WorkController
 * @package App\Controller
 */
class WorkController extends GenericController {


    /**
     * @param int|null $limit
     * @param string $vue
     * @return \Symfony\Component\HttpFoundation\Response
     * Vue index des works avec sa variable
     */
    public function indexAction(int $limit = null, string $vue = 'index'){
      $works = $this->_repository->findBy([], ["date" => "DESC"], $limit);
      return $this->render('works/'. $vue .'.html.twig',[
        'works' => $works
      ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * Vue d'ajout de work avec sa variable et son formulaire avec redirection en cas de succès
     */
    public function addAction(Request $request){
      $work = new Work();
      $form = $this->createForm(WorkType::class, $work);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($work);
        $manager->flush();
        $this->get('session')->getFlashBag()->clear();
        $this->addFlash('message', "La work a bien été ajoutée");
        return $this->redirectToRoute('app_pages_success');
      }

      return $this->render('works/add.html.twig', [
            'work' => $work,
          'form' => $form->createView()
        ]);

    }

    /**
     * @param Work $work
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * Vue de modification de work avec sa variable et son formulaire avec redirection en cas de succès
     */
    public function editAction(Work $work, Request $request){
      $form = $this->createForm(WorkType::class, $work);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $manager = $this->getDoctrine()->getManager();
        $manager->flush();
        $this->get('session')->getFlashBag()->clear();
        $this->addFlash('message', "Le work a bien été modifiée");
        return $this->redirectToRoute('app_pages_success');
      }

      return $this->render('works/edit.html.twig', [
            'work' => $work,
          'form' => $form->createView()
        ]);
    }


    /**
     * @param Work $work
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * Confirmation de suppression avec redirection en cas de succès et affichage d'une vue intermédiaire avant de returner sur la vue index des works
     */
    public function deleteAction(Work $work, Request $request){
      if ($this->isCsrfTokenValid('delete'.$work->getId(), $request->get('_token'))){
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($work);
        $manager->flush();
        $this->get('session')->getFlashBag()->clear();
        $this->addFlash('message', "La work a bien été supprimée");
      }
      return $this->redirectToRoute('app_pages_success');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function searchAction(Request $request){
      $word = $request->get('word');
      $search = explode(' ', $word);
      $works = $this->_repository->findBySearch($search);

      return $this->render('works/indexBySearch.html.twig',[
        'works' => $works
      ]);
    }


}
